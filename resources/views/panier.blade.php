@extends('layouts.app')

@section('title', 'Votre Panier')

@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Cart</h1>
                </div>
            </div>
                    {{-- <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="{{ asset('images/.jpg') }}" class="img-fluid">
                        </div>
                    </div> --}}
            </div>

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Produit</th>
                                <th class="product-price">Prix</th>
                                <th class="product-quantity">Quantité</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                            <!-- JS injecte ici -->
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-black btn-sm btn-block" onclick="renderCart()">Mettre à jour</button>
                    </div>
                    <div class="col-md-6">
                        <a href="/" class="btn btn-outline-black btn-sm btn-block">Continuer les achats</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Sous-total</span>
                            </div>
                            <div class="col-md-6 text-right" id="cartSubtotal">
                                <strong class="text-black">0€</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right" id="cartTotal">
                                <strong class="text-black">0€</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-black btn-lg py-3 btn-block" id="checkoutBtn">
                                    Procéder à la commande
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('admin.footer')

@endsection

@push('scripts')
<script>
function renderCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let tbody = document.getElementById('cartTableBody');
    tbody.innerHTML = '';
    let subtotal = 0;

    cart.forEach(item => {
        let total = (item.prix || item.price) * (item.quantite || item.quantity || 1);
        subtotal += total;

        let row = document.createElement('tr');
        row.innerHTML = `
            <td class="product-thumbnail">
                ${item.image ? `<img src='/storage/${item.image}' class='img-fluid' style='max-width:80px;'>` : '📱'}
            </td>
            <td class="product-name"><h2 class="h5 text-black">${item.nom || item.name}</h2></td>
            <td>${(item.prix || item.price).toFixed(2)}€</td>
            <td>
                <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-black decrease" type="button" onclick="updateQuantity(${item.id}, -1)">&minus;</button>
                    </div>
                    <input type="text" class="form-control text-center quantity-amount" value="${item.quantite || item.quantity || 1}" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-outline-black increase" type="button" onclick="updateQuantity(${item.id}, 1)">&plus;</button>
                    </div>
                </div>
            </td>
            <td>${total.toFixed(2)}€</td>
            <td><a href="#" class="btn btn-black btn-sm" onclick="removeFromCart(${item.id})">X</a></td>
        `;
        tbody.appendChild(row);
    });

    document.getElementById('cartSubtotal').innerHTML = `<strong class="text-black">${subtotal.toFixed(2)}€</strong>`;
    document.getElementById('cartTotal').innerHTML = `<strong class="text-black">${subtotal.toFixed(2)}€</strong>`;
}

function updateQuantity(id, delta) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let item = cart.find(i => i.id == id);
    if (!item) return;
    item.quantite = (item.quantite || item.quantity || 1) + delta;
    if (item.quantite < 1) item.quantite = 1;
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(i => i.id != id);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

document.addEventListener('DOMContentLoaded', function () {
    renderCart();

    document.getElementById('checkoutBtn').addEventListener('click', async function (e) {
        e.preventDefault();
        @if(auth()->check())
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            if (cart.length === 0) {
                alert("Votre panier est vide.");
                return;
            }

            try {
                const response = await fetch("{{ route('cart.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ cart })
                });

                if (response.ok) {
                    // Vider le panier local après enregistrement
                    localStorage.removeItem('cart');
                    window.location.href = '/commande';
                } else {
                    alert("Erreur lors de l'enregistrement du panier.");
                }
            } catch (error) {
                console.error("Erreur réseau :", error);
                alert("Erreur de connexion.");
            }
        @else
            window.location.href = '{{ route('login') }}?intended=/commande';
        @endif
    });
});
</script>
@endpush
