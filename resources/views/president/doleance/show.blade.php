<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Détail de la Doléance</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background:  #fff0e5;
      margin: 0;
      padding: 2rem;
      color: #333;
    }
    .container {
      max-width: 900px;
      margin: 0 auto;
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      overflow: hidden;
    }
    .back-button {
      display: inline-block;
      margin-bottom: 1rem;
      padding: 0.5rem 1rem;
      background-color: #FF8500;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .back-button:hover {
      background-color:#FF8500;
    }
    .header {
      background:#FF8500;
      color: white;
      padding: 2rem;
      border-bottom: 4px soli#FF8500;
    }
    .header h1 {
      margin: 0 0 0.5rem;
      font-size: 2rem;
    }
    .meta {
      display: flex;
      gap: 2rem;
      font-size: 0.9rem;
      color: #ffe6cc;
    }
    .section {
      padding: 2rem;
      border-bottom: 1px solid #eee;
    }
    .section:last-child {
      border: none;
    }
    .section h2 {
      margin-top: 0;
      font-size: 1.2rem;
      color:#FF8500;
    }
    .attachments {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }
    .attachment {
      background: #fff0e6;
      padding: 0.8rem 1rem;
      border-radius: 8px;
      font-size: 0.9rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ route('doleances.index') }}" class="back-button">← Retour</a>
    <div class="header">
      <h1>Doléance #{{ $doleance->id }}</h1>
      <div class="meta">
        <div><strong>Statut:</strong> {{ ucfirst($doleance->statut) }}</div>
        <div><strong>Soumise le:</strong> {{ $doleance->created_at->format('d/m/Y') }}</div>
      </div>
    </div>

    <div class="section">
      <h2>Titre de la Doléance</h2>
      <p>{{ $doleance->titre }}</p>
    </div>

    <div class="section">
      <h2>Description</h2>
      <p>{{ $doleance->description }}</p>
    </div>

    @if($doleance->reponse)
    <div class="section">
      <h2>Réponse du Service</h2>
      <p>{{ $doleance->reponse }}</p>
    </div>
    @endif

    @if($doleance->pieces_jointes && count($doleance->pieces_jointes))
    <div class="section">
      <h2>Pièces jointes</h2>
      <div class="attachments">
        @foreach($doleance->pieces_jointes as $fichier)
          <div class="attachment">{{ $fichier }}</div>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</body>
</html>
