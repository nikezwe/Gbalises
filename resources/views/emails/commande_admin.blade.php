<h1>Nouvelle commande reçue</h1>
<p>Bonjour Admin,</p>
<p>Une nouvelle commande vient d'être passée par {{ $user->name ?? $user->email }}.</p>
<strong>Détails de la commande :</strong>
<ul>
@foreach($balises as $balise)
    <li><strong>Produit :</strong> {{ $balise->nom }} (Réf: {{ $balise->reference ?? $balise->id }})</li>
@endforeach
</ul>
<p>Merci de traiter cette commande dans les plus brefs délais.</p>
