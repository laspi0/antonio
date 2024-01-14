<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    h2 {
        color: #333;
    }

    form {
        margin-top: 20px;
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

<div class="container">
    <h2>Réservation de Billet</h2>

    <form method="POST" action="{{ route('billets.store') }}">
        @csrf

        <div>
            <label for="classe">Classe :</label>
            <select name="classe" required>
                <option value="economique">Économique</option>
                <option value="affaires">Affaires</option>
                <option value="premiere">Première</option>
            </select>
        </div>

        <div>
            <label for="tarif">Tarif :</label>
            <input type="number" name="tarif" required>
        </div>

        <div>
            <label for="depart">Départ :</label>
            <input type="text" name="depart" required>
        </div>

        <div>
            <label for="arrive">Arrivée :</label>
            <input type="text" name="arrive" required>
        </div>

        <div>
            <label for="heure_depart">Heure de Départ :</label>
            <input type="datetime-local" name="heure_depart" required>
        </div>

        <button type="submit">Réserver</button>
    </form>
</div>