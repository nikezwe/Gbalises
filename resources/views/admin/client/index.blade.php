@extends('admin.admin')


@section('content')
 
<div class="d-flex justify-content-between align-items-center">
   <h1>Les Clients</h1> 
   <a href="{{route('admin.client.create)}}"class="btn-btn-primary">Ajouter un client</a>
</div>




<table class="table table-string">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as client)
            <tr>
                <td>{{$client->nom}}</td>
                <td>{{$client->prenom}}</td>
                <td>{{$client->telephone}}</td>
                <td>{{$client->email}}</td>
            </tr>
            <div class="d-flex gap-2 w-100 justify-content-end ">
                <a href="{{route('admin.client.edit',$client)}}" class="btn-btn-primary">Editer</a>
                <form action="{{route('admin.client.destroy',$client)}}">
                    @csrf
                    @method("delete")
                    <button class="btn-btn-danger">Supprimer</button>
                </form>
            </div>
        @endforeach
    </tbody>
</table>
 {{$clients->links()}}
@endsection