@extends('layouts.app')
@extends('admin.admin')
@section('content')
<h1>Gestion du stock</h1>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table>
    <tr>
        <th>Nom</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>
    @foreach($balises as $balise)
    <tr @if($balise->stock < 5) style="background:#ffe5e5" @endif>
        <td>{{ $balise->nom }}</td>
        <td>
            <form action="{{ route('admin.stock.update', $balise) }}" method="POST">
                @csrf
                <input type="number" name="stock" value="{{ $balise->stock }}" min="0">
                <button type="submit">Mettre à jour</button>
            </form>
            @if($balise->stock < 5)
                <span style="color:red;">Stock faible !</span>
            @endif
        </td>
        <td>
            <!-- Autres actions si besoin -->
        </td>
    </tr>
    @endforeach
</table>
@endsection