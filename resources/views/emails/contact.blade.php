<!-- <x-mail::message>
# Nouvelle demande de contact


- **Nom**: {{ $data['nom'] }}  
- **Prénom**: {{ $data['prenom'] }}  
- **Email**: {{ $data['email'] }}  
- **Téléphone**: {{ $data['telephone'] }}

**Message :**<br/>
{{ $data['message'] }}

</x-mail::message> -->

<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle commande</title>
</head>
<body>
    <h1>Nouvelle commande</h1>
    <p><strong>Balise :</strong> {{ $data['balise']->nom }}</p>
    <p><strong>Nom :</strong> {{ $data['nom'] }}</p>
    <p><strong>Prénom :</strong> {{ $data['prenom'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>
    <p><strong>Téléphone :</strong> {{ $data['telephone'] }}</p>
    <p><strong>Quantité :</strong> {{ $data['quantite'] }}</p>
</body>
</html>