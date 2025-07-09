<form action="{{ route('cart.store') }}" method="POST">
    @csrf
    <input type="hidden" name="balise_id" value="{{ $balise->id }}">
    <input type="number" name="quantite" value="1" min="1" class="form-control mb-2">
    <button type="submit" class="btn btn-primary">Ajouter au Panier</button>
</form>