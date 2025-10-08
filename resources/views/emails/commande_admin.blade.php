<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .order-details {
            background-color: #f9f9f9;
            padding: 15px;
            margin: 20px 0;
            border-left: 4px solid #007cba;
        }
        .items-list {
            margin: 20px 0;
        }
        .item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            color: #007cba;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouvelle commande reçue</h1>
        </div>
        
        <div class="content">
            <div class="order-details">
                <h2>Détails de la commande</h2>
                <p><strong>Numéro de commande :</strong> #{{ $commande->id }}</p>
                <p><strong>Client :</strong> {{ $commande->nom }}</p>
                <p><strong>Email :</strong> {{ $commande->email }}</p>
                <p><strong>Date :</strong> {{ $commande->created_at->format('d/m/Y à H:i') }}</p>
                <p><strong>État :</strong> {{ ucfirst($commande->etat) }}</p>
            </div>
            
            <div class="items-list">
                <h3>Articles commandés :</h3>
                @if($commande->balisecommandes && $commande->balisecommandes->count() > 0)
                    @php $total = 0; @endphp
                    @foreach($commande->balisecommandes as $item)
                        <div class="item">
                            <strong>{{ $item->balise->nom ?? 'Article inconnu' }}</strong><br>
                            Quantité : {{ $item->quantite }}<br>
                            Prix unitaire : {{ number_format($item->prix, 2) }}€<br>
                            Sous-total : {{ number_format($item->quantite * $item->prix, 2) }}€
                        </div>
                        @php $total += $item->quantite * $item->prix; @endphp
                    @endforeach
                    
                    <div class="item total">
                        TOTAL : {{ number_format($total, 2) }}€
                    </div>
                @else
                    <p>Aucun article trouvé pour cette commande.</p>
                @endif
            </div>
            
            <p>Vous pouvez gérer cette commande depuis votre panel d'administration.</p>
        </div>
    </div>
</body>
</html>