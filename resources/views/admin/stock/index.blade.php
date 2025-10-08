@extends('layouts.app')
@section('title','stock')
@section('content')
    <h1>Gestion du stock des balises</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table border="1" cellpadding="8" style="width:100%;margin-top:20px;">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($balises as $balise)
                <tr @if($balise->stock < 5) style="background:#ffe5e5" @endif>
                    <td>{{ $balise->nom }}</td>
                    <td>
                        <form action="{{ route('admin.stock.update', $balise) }}" method="POST" style="display:inline-flex;align-items:center;gap:8px;">
                            @csrf
                            <input type="number" name="stock" value="{{ $balise->stock }}" min="0" style="width:70px;">
                            <button type="submit">Mettre à jour</button>
                        </form>
                        @if($balise->stock < 5)
                            <span style="color:red;">Stock faible !</span>
                        @endif
                    </td>
                    <td><!-- Autres actions si besoin --></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('admin.footer')
@endsection
