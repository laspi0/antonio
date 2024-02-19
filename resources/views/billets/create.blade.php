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
            <label for="depart">Départ :</label>
            <select id="depart" name="depart" required>
            </select>
        </div>

        <div>
            <label for="arrive">Arrivée :</label>
            <select id="arrive" name="arrive" required>
            </select>
        </div>
        <div>
            <label for="classe">Classe :</label>
            <select name="classe" required>
                <option value="1ère classe">1ère classe</option>
                <option value="2ème classe">2ème classe</option>
            </select>
        </div>

        <div>
            <label for="tarif">Tarif :</label>
            <input type="number" name="tarif" disabled required>
        </div>

        


        <div>
            <label for="heure_depart">Heure de Départ :</label>
            <input type="datetime-local" name="heure_depart" required>
        </div>

        <button type="submit">Réserver</button>
    </form>
</div>


<script src="jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var lieux = ['Dakar', 'Colobane', 'Hann', 'Dalifort', 'Baux-Maraichers', 'Thiaroye', 'Yembeul', 'Keur Mbaye Fall', 'PNR', 'Rufisque', 'Bargny', 'Diamniado'];

        // Fonction pour ajouter les options à un menu déroulant
        function ajouterOptions(selectId, lieux) {
            var select = $('#' + selectId);
            lieux.forEach(function (lieu) {
                select.append($('<option>', {
                    value: lieu,
                    text: lieu
                }));
            });
        }

        var lieuxZone1 = ['Dakar', 'Colobane', 'Hann', 'Dalifort', 'Baux-Maraichers'];
        var lieuxZone2 = ['Thiaroye', 'Yembeul', 'Keur Mbaye Fall', 'PNR', 'Rufisque', 'Bargny', 'Diamniado'];

        // Appel de la fonction pour remplir les menus déroulants
        ajouterOptions('depart', lieux);
        ajouterOptions('arrive', lieux);

        // Tarifs correspondants aux trajets
        var tarifZone1 = 500;
        var tarifZone2 = 500;
        var tarifZone1VersZone2 = 1000;
        var tarifZone2VersZone1 = 1000;

        // Fonction pour mettre à jour le tarif en fonction de la sélection de départ et d'arrivée
        function mettreAJourTarif() {
            var depart = $('#depart').val();
            var arrive = $('#arrive').val();
            var tarif;

            if (lieuxZone1.includes(depart) && lieuxZone1.includes(arrive)) {
                tarif = tarifZone1;
            } else if (lieuxZone2.includes(depart) && lieuxZone2.includes(arrive)) {
                tarif = tarifZone2;
            } else if (lieuxZone1.includes(depart) && lieuxZone2.includes(arrive)) {
                tarif = tarifZone1VersZone2;
            } else if (lieuxZone2.includes(depart) && lieuxZone1.includes(arrive)) {
                tarif = tarifZone2VersZone1;
            }

            $('input[name="tarif"]').val(tarif);
        }

        // Appel de la fonction lorsqu'il y a un changement dans les menus déroulants
        $('#depart, #arrive').change(function () {
            mettreAJourTarif();
        });

        // Initialiser le tarif en fonction des valeurs par défaut des menus déroulants
        mettreAJourTarif();
    });
</script>



