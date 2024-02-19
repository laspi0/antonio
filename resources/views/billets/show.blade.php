<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Billet</title>
    <style>
        /* Styles intégrés */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #3498db;
            color: #fff;
            border: 1px solid #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border: 1px solid #2980b9;
        }

        /* Style pour le code QR */
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 250px;
            height: 250px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Détails du Billet</h2>

    <table class="table">
        <tbody>
            <tr>
                <th>Classe</th>
                <td>{{ $billet->classe }}</td>
            </tr>
            <tr>
                <th>Départ</th>
                <td>{{ $billet->depart }}</td>
            </tr>
            <tr>
                <th>Arrivée</th>
                <td>{{ $billet->arrive }}</td>
            </tr>
            <tr>
                <th>Heure de Départ</th>
                <td>{{ $billet->heure_depart }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Code QR -->
    <div class="qr-code">
    <div>{!! $qrCode !!}</div>
    </div>

    <a href="{{ route('billets.index') }}" class="btn btn-primary">Retour à la liste des billets</a>
</div>

</body>
</html>
