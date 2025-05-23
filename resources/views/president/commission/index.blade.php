<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Membres de la commission</title>
  <link rel="icon" type="image/png" href="{{ asset('images/Sonatrachh.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #fff0e5;
      font-family: 'Poppins', sans-serif;
    }
    table th, table td {
      padding: 12px;
      border-bottom: 1px solid #eee;
    }
  </style>
</head>
<body class="text-[#333]">

<!-- Menu -->
<aside class="fixed top-0 left-0 h-full w-[170px] bg-white shadow-lg flex flex-col justify-between py-6 z-50">
  <div>
    <div class="flex justify-center mb-8">
      <img src="{{ asset('images/sonatrach-logo.svg') }}" alt="Logo Sonatrach" style="height: 60px;">
    </div>
    <nav class="flex flex-col gap-6 px-4 text-[#333] text-sm font-medium">
      <a href="{{ route('president.dashboard') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5] transition">
        <i class="fas fa-chart-pie text-[#fe5e00]"></i>
        <span>Statistiques</span>
      </a>
      <a href="{{ route('commission.index') }}" class="flex items-center gap-3 p-2 rounded-lg bg-[#fff0e5] font-semibold">
        <i class="fas fa-users text-[#fe5e00]"></i>
        <span>Liste du Commission</span>
      </a>
      <a href="{{ route('reunion.create') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5] transition">
        <i class="fas fa-calendar-plus text-[#fe5e00]"></i>
        <span>Créer une réunion</span>
      </a>
      <a href="#" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5] transition">
        <i class="fas fa-paper-plane text-[#fe5e00]"></i>
        <span>Soumettre une doléance</span>
      </a>
      <a href="#" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5] transition">
        <i class="fas fa-inbox text-[#fe5e00]"></i>
        <span>Mes doléances</span>
      </a>
    </nav>
  </div>

  <div class="px-4 mt-8">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-3 p-2 rounded-lg text-red-600 hover:bg-red-100 transition">
      <i class="fas fa-sign-out-alt"></i>
      <span>Déconnexion</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</aside>
<main class="ml-[170px] p-6">
  <h2 class="text-3xl font-semibold mb-6">Membres de la commission</h2>


 <!-- Informations sur la commission -->
<div class="mb-6">
  <div class="bg-[#fdd6b8] text-[#333] font-semibold px-4 py-2 rounded-t-md">
    Informations sur la commission
  </div>
  <div class="bg-white border border-[#fdd6b8] rounded-b-md p-4">
  <p><strong>Date de création :</strong> {{ $commission->date_creation }}</p>
  <p><strong>Date de fin :</strong> {{ $commission->date_fin }}</p>
</div>

</div>
  <!-- Tableau des membres -->
  <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
    <table class="w-full text-left text-sm">
      <thead>
        <tr class="bg-[#fdd6b8] text-[#333] font-semibold">
          <th>Nom</th>
          <th>Prénom</th>
          <th>Email</th>
          <th>Domaine </th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody>
        @foreach($membres as $membre)
        <tr>
          <td>{{ $membre->user->nom ?? '-' }}</td>
<td>{{ $membre->user->prenom ?? '-' }}</td>
<td>{{ $membre->user->email ?? '-' }}</td>
<td>{{ $membre->user->nom ?? '-' }}</td>
          <td>
            @if($membre->statut == 'travail')
              <span class="text-green-600 font-medium">Travail</span>
            @else
              <span class="text-red-500 font-medium">Congé</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>


</body>
</html>
