<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle demande de contact</title>
</head>
<body>
    <h1>Nouvelle demande de contact</h1>
    <p><strong>Nom :</strong> {{ $data['nom'] }}</p>
    <p><strong>Prénom :</strong> {{ $data['prenom'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>
    <p><strong>Téléphone :</strong> {{ $data['telephone'] }}</p>
    <p><strong>Message :</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>