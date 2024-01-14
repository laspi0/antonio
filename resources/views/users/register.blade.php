<!-- Ajoutez ces styles à l'intérieur de la balise head de votre fichier ou dans un fichier CSS séparé -->
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

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center; /* Centrer le formulaire */
    }

    h2 {
        color: #333;
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    input {
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

    p {
        color: #d9534f;
        margin-top: 5px;
    }
</style>

<!-- Le formulaire avec le titre "Inscription" en haut -->
<form method="POST" action="{{ route('register') }}">
    @csrf

    <h2>Inscription</h2>

    <div>
        <label for="name">Nom:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email">Adresse email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <p>Déjà un compte? <a href="{{ route('login') }}">Connectez-vous ici</a>.</p>

    <button type="submit">S'inscrire</button>
</form>
