<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Président</title> 

  <link rel="icon" type="image/png" href="{{ asset('images/Sonatrachh.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #fff0e5;
      font-family: 'Poppins', sans-serif;
    }
    #centerText {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80px;
      height: 80px;
      border-radius: 50%;
      font-size: 24px;
      font-weight: bold;
      color: #333;
      background: #ffffff;
      padding: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border: 3px solid #fdd6b8;
      flex-direction: column;
    }
    .graph-container {
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }
    .graph-card {
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }
    .graph-card:hover {
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>
<body class="text-[#333] bg-[#fff0e5] font-['Poppins']">

<!-- Sidebar -->
<aside class="fixed top-0 left-0 h-full w-[170px] bg-white shadow-lg flex flex-col justify-between py-6 z-50">
  <div>
    <div class="flex justify-center mb-8">
      <img src="{{ asset('images/sonatrach-logo.svg') }}" alt="Logo Sonatrach" style="height: 60px;">
    </div>
    <nav class="flex flex-col gap-6 px-4 text-sm font-medium">
      <a href="#" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5]">
        <i class="fas fa-chart-pie text-[#fe5e00]"></i> Statistiques
      </a>
      <a href="{{ route('commission.index') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5]">
        <i class="fas fa-users text-[#fe5e00]"></i> Liste du Commission
      </a>
      <a href="{{ route('reunion.create') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5]">
        <i class="fas fa-calendar-plus text-[#fe5e00]"></i> Créer une réunion
      </a>
      <a href="#" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5]">
        <i class="fas fa-paper-plane text-[#fe5e00]"></i> Soumettre une doléance
      </a>
      <a href="#" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5]">
        <i class="fas fa-inbox text-[#fe5e00]"></i> Mes doléances
      </a>
    </nav>
  </div>
  <div class="px-4">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-3 p-2 rounded-lg text-red-600 hover:bg-red-100">
      <i class="fas fa-sign-out-alt"></i> Déconnexion
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
  </div>
</aside>

<!-- Main Content -->
<main class="ml-[170px] p-6">
  <h2 class="text-3xl font-semibold mb-8">Bienvenue Président !</h2>

  <!-- Statistiques -->
  @php
    $traitees = $doleances->where('etat', 'traitée')->count();
    $rejetees = $doleances->where('etat', 'rejetée')->count();
    $attente = $doleances->where('etat', 'soumise')->count();
  @endphp
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
    <div class="graph-card hover:scale-105">
      <p class="text-sm text-gray-500">Doléances reçues</p>
      <p class="text-2xl font-bold text-[#fe5e00]">{{ $doleances->count() }}</p>
    </div>
    <div class="graph-card hover:scale-105">
      <p class="text-sm text-gray-500">Traitées</p>
      <p class="text-2xl font-bold">{{ $traitees }}</p>
    </div>
    <div class="graph-card hover:scale-105">
      <p class="text-sm text-gray-500">Rejetées</p>
      <p class="text-2xl font-bold">{{ $rejetees }}</p>
    </div>
    <div class="graph-card hover:scale-105">
      <p class="text-sm text-gray-500">En attente</p>
      <p class="text-2xl font-bold">{{ $attente }}</p>
    </div>
  </div>

  <!-- Graphiques -->
  <div class="graph-container">
    <!-- Line Chart -->
    <div class="graph-card w-2/3">
      <h3 class="text-lg font-semibold mb-4">Évolution des doléances</h3>
      <canvas id="lineChart"></canvas>
    </div>

    <!-- Pie Chart -->
    <div class="graph-card w-1/3 flex flex-col items-center">
      <h3 class="text-lg font-semibold mb-4">Répartition des doléances</h3>
      <div class="relative w-[220px] h-[220px]">
        <canvas id="pieChart" width="220" height="220"></canvas>
        <div id="centerText">
          <p class="text-2xl font-bold">{{ $doleances->count() }}</p>
          <span class="text-[11px] font-medium">Total</span>
        </div>
      </div>
      <div class="w-full mt-4 text-sm">
        <div class="flex justify-between px-2"><span class="text-[#04d1ae]">Traitées</span><span class="font-semibold">{{ $traitees }}</span></div>
        <div class="flex justify-between px-2"><span class="text-[#fe5e00]">Rejetées</span><span class="font-semibold">{{ $rejetees }}</span></div>
        <div class="flex justify-between px-2"><span class="text-[#fdd6b8]">En attente</span><span class="font-semibold">{{ $attente }}</span></div>
      </div>
    </div>
  </div>
  <!-- Dernières doléances -->
 <section>
  <h3 class="text-xl font-semibold mb-4">Dernières doléances soumises</h3>

  <div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full text-sm text-left text-[#333]">
      <thead class="bg-[#fdd6b8] text-[#333] uppercase text-xs">
        <tr>
          <th class="px-6 py-3">#</th>
          <th class="px-6 py-3">Titre</th>
          <th class="px-6 py-3">Utilisateur</th>
          <th class="px-6 py-3">Date de soumission</th>
          <th class="px-6 py-3">État</th>
          <th class="px-6 py-3">Action</th>
        </tr>
      </thead>

      <tbody>
        @forelse ($doleances as $doleance)
        <tr class="border-b align-top">
          <td class="px-6 py-4">{{ $loop->iteration }}</td>
          <td class="px-6 py-4">{{ $doleance->titre }}</td>
          <td class="px-6 py-4">{{ $doleance->user->nom }}</td>
          <td class="px-6 py-4">{{ \Carbon\Carbon::parse($doleance->dateSoumission)->format('d/m/Y') }}</td>

          {{-- État stylisé --}}
          <td class="px-6 py-4">
            @php
              $etatCouleurs = [
                'traitée' => 'bg-green-100 text-green-700',
                'en attente' => 'bg-yellow-100 text-yellow-800',
                'en cours' => 'bg-blue-100 text-blue-700',
              ];
              $style = $etatCouleurs[$doleance->etat] ?? 'bg-red-100 text-red-700';
            @endphp
            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $style }}">
              {{ ucfirst($doleance->etat) }}
            </span>
          </td>
<td class="px-6 py-4 max-w-xs">
  @if(strcasecmp($doleance->etat, 'en cours') === 0)
    {{-- Boutons Traiter / Rejeter --}}
    <form method="POST" action="{{ route('doleance.updateEtat', $doleance->id) }}" style="display:inline;">
      @csrf
      @method('PUT')
      <input type="hidden" name="etat" value="traitée">
      <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded">
        Traiter
      </button>
    </form>

    <form method="POST" action="{{ route('doleance.updateEtat', $doleance->id) }}" style="display:inline;">
      @csrf
      @method('PUT')
      <input type="hidden" name="etat" value="rejetée">
      <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
        Rejeter
      </button>
    </form>
@elseif($doleance->etat === 'traitée' || $doleance->etat === 'rejetée')
  {{-- Formulaire unique pour PV et décision --}}
  <form action="{{ route('doleance.pvDecision', $doleance->id) }}" method="POST" enctype="multipart/form-data" class="space-y-2">
    @csrf

    {{-- Upload PV --}}
    <input type="file" id="pv_file_{{ $doleance->id }}" name="pv_file" accept=".pdf,.doc,.docx" class="hidden"
      onchange="document.getElementById('fileName_{{ $doleance->id }}').textContent = this.files[0]?.name || ''">

    <button type="button" onclick="document.getElementById('pv_file_{{ $doleance->id }}').click()"
  class="px-4 py-2 bg-gray-200 text-black rounded text-sm hover:bg-gray-300">
  Ajouter le PV
</button>

    <span id="fileName_{{ $doleance->id }}" class="ml-2 text-sm text-gray-600"></span>

    {{-- Bouton pour enregistrer uniquement le PV --}}
    <button type="submit" name="action" value="save_pv"
      class="px-4 py-2 bg-[#fe5e00] hover:bg-[#d14c00] text-white rounded text-sm">
      Enregistrer PV
    </button>

    {{-- Décision --}}
    <label class="block text-sm font-medium text-gray-700 mt-4">Décision :</label>
    <textarea name="decision" rows="2" class="w-full border rounded p-2 text-sm">{{ old('decision', $doleance->decision) }}</textarea>

    {{-- Bouton pour enregistrer uniquement la décision --}}
    <button type="submit" name="action" value="save_decision"
      class="px-4 py-2 bg-[#fe5e00] hover:bg-[#d14c00] text-white rounded text-sm">
      Enregistrer décision
    </button>
  </form>

  @if($doleance->pv)
    <div class="mt-2">
        <a href="{{ route('doleance.downloadPv', $doleance->id) }}" target="_blank" class="text-blue-600 underline text-sm">Voir le PV</a>
    </div>
@endif


  {{-- Afficher décision --}}
  @if($doleance->decision)
    <p class="text-sm mt-1">{{ $doleance->decision }}</p>
  @endif
@endif


        @empty
        <tr>
          <td colspan="7" class="text-center py-4 text-gray-500 italic">Aucune doléance à afficher.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
</main>

<!-- Chart.js script -->
<script>
  // Line Chart
  const ctxLine = document.getElementById('lineChart').getContext('2d');
  new Chart(ctxLine, {
    type: 'line',
    data: {
      labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
      datasets: [{
        label: 'Doléances',
        data: [12, 19, 8, 15, 10, 17],
        borderColor: '#fe5e00',
        backgroundColor: 'rgba(254, 94, 0, 0.1)',
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } }
    }
  });

  // Pie Chart
  const ctxPie = document.getElementById('pieChart').getContext('2d');
  new Chart(ctxPie, {
    type: 'doughnut',
    data: {
      labels: ['Traitées', 'Rejetées', 'En attente'],
      datasets: [{
        data: [{{ $traitees }}, {{ $rejetees }}, {{ $attente }}],
        backgroundColor: ['#04d1ae', '#fe5e00', '#fdd6b8'],
        borderWidth: 1
      }]
    },
    options: {
      cutout: '70%',
      plugins: { legend: { display: false } }
    }
  });
</script>

</body>
</html>
