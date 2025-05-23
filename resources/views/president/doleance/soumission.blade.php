<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soumettre une doléance</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background-color: #fff0e5;
    }

    .container {
      max-width: 700px;
      margin: 60px auto;
      background-color: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color:#fe5e00;
    }

    form label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }

    form input,
    form textarea,
    form select {
      width: 100%;
      padding: 10px 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    form input[type="file"] {
      padding: 8px;
    }

    form button {
      background-color: #fe5e00;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    form button:hover {
      background-color: #e45200;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Soumettre une Doléance</h1>

    <form action="{{ route('doleances.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" required>

      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" name="prenom" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="telephone">Téléphone</label>
      <input type="tel" id="telephone" name="telephone" required>

      <label for="domaine">Domaine</label>
      <select id="domaine" name="domaine_id" required>
        <option value="">-- Sélectionnez un domaine --</option>
        @foreach ($domaines as $domaine)
          <option value="{{ $domaine->id }}">{{ $domaine->nom }}</option>
        @endforeach
      </select>

      <label for="objet">Objet</label>
      <input type="text" id="objet" name="titre" required>

      <label for="description">Description</label>
      <textarea id="description" name="description" rows="6" required></textarea>

      <label for="fichier">Pièce jointe (PDF uniquement)</label>
      <input type="file" id="fichier" name="fichier" accept="application/pdf">

      <button type="submit">Soumettre la doléance</button>
    </form>
  </div>
</body>
</html>
