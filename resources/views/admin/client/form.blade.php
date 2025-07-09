@extends('admin.admin')

@section('title', $client->exists? "Editer un client" : "Creer un client")

@section('content')

<h4>@yield('title')</h4>

<form class="vstack gap-2" action="{{route($client->exists? 'admin.client.update': 'admin.client.store', $client)}}"method="post" >

    @csrf
    @method($client-> exists ? 'put':'post')

    <div class="row">
    @include('shared.input',['class'='col','label'=> 'Nom','name'=>'nom','value'=>$client->nom])
    @include('shared.input',['class'='col','label'=> 'Prenom','name'=>'prenom','value'=>$client->prenom])
    @include('shared.input',['class'='col','label'=> 'Telephone','name'=>'telephone','value'=>$client->telephone])
    @include('shared.input',['class'='col','label'=> 'Email','name'=>'email','value'=>$client->email])
    </div>
    <div>
        <button class="btn-btn-primary">
            @if($client>exists)
            Modifier
            else
            Creer
            @endif
        </button>
    </div>
</form>