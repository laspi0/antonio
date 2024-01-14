<!-- resources/views/billets/index.blade.php -->
<style>
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
    }

    h2 {
        color: #333;
    }

    .menu-container {
        background-color: #3498db;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .menu a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .menu a:hover {
        background-color: #2c3e50;
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

    .btn-info {
        background-color: #3498db;
        color: #fff;
        border: 1px solid #3498db;
    }

    .btn-info:hover {
        background-color: #2980b9;
        border: 1px solid #2980b9;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: 1px solid #e74c3c;
    }

    .btn-danger:hover {
        background-color: #c0392b;
        border: 1px solid #c0392b;
    }
</style>

<div class="container">
    <div class="menu-container">
        <div class="menu">
            <a href="{{ route('billets.create') }}" class="btn btn-primary">Réserver un billet</a>
            <a href="{{ route('billets.index') }}" class="btn btn-success">Voir mes réservations</a>
            <a href="{{ route('logout') }}" class="btn btn-warning">Déconnexion</a>
        </div>
    </div>

    <h2>Mes Billets</h2>

    @if(count($billets) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Classe</th>
                <th>Départ</th>
                <th>Arrivée</th>
                <th>Heure de Départ</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($billets as $billet)
            <tr>
                <td>{{ $billet->classe }}</td>
                <td>{{ $billet->depart }}</td>
                <td>{{ $billet->arrive }}</td>
                <td>{{ $billet->heure_depart }}</td>
                <td>
                    <a href="{{ route('billets.show', $billet->id) }}" class="btn btn-info">Voir</a>
                    <form action="{{ route('billets.destroy', $billet->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce billet?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Aucun billet disponible.</p>
    @endif
</div>
