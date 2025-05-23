<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer une réunion</title>
  <link rel="icon" type="image/png" href="{{ asset('images/Sonatrachh.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #fff0e5;
      font-family: 'Poppins', sans-serif;
    }
    input, select, textarea {
      border: 1px solid #ddd;
    }
    input:focus, select:focus, textarea:focus {
      border-color: #fe5e00;
      outline: none;
      box-shadow: 0 0 0 1px #fe5e00;
    }
    option {
      padding: 5px;
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
      <a href="{{ route('commission.index') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#fff0e5] transition">
        <i class="fas fa-users text-[#fe5e00]"></i>
        <span>Liste du Commission</span>
      </a>
      <a href="{{ route('reunion.create') }}" class="flex items-center gap-3 p-2 rounded-lg bg-[#fff0e5] font-semibold">
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
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
  </div>
</aside>

<!-- Formulaire -->
<main class="ml-[170px] p-8 bg-[#fff0e5] min-h-screen">
  <h2 class="text-4xl font-bold text-[#333] mb-8 flex items-center gap-3">
    <i class="fas fa-calendar-plus text-[#fe5e00] text-2xl"></i> Créer une réunion
  </h2>

  <form action="{{ route('reunion.store') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-3xl space-y-6">
    @csrf

    <div>
      <label for="titre" class="block text-sm font-semibold text-[#333] mb-1">Titre de la réunion</label>
      <div class="relative">
        <i class="fas fa-heading absolute top-3 left-3 text-[#fe5e00]"></i>
        <input type="text" id="titre" name="titre" required class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#fe5e00]">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="date" class="block text-sm font-semibold text-[#333] mb-1">Date</label>
        <div class="relative">
          <i class="fas fa-calendar-alt absolute top-3 left-3 text-[#fe5e00]"></i>
          <input type="date" id="date" name="date" required class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#fe5e00]">
        </div>
      </div>
      <div>
        <label for="heure" class="block text-sm font-semibold text-[#333] mb-1">Heure</label>
        <div class="relative">
          <i class="fas fa-clock absolute top-3 left-3 text-[#fe5e00]"></i>
          <input type="time" id="heure" name="heure" required class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#fe5e00]">
        </div>
      </div>
      <div class="md:col-span-2">
        <label for="lieu" class="block text-sm font-semibold text-[#333] mb-1">Lieu</label>
        <div class="relative">
          <i class="fas fa-map-marker-alt absolute top-3 left-3 text-[#fe5e00]"></i>
          <input type="text" id="lieu" name="lieu" required class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#fe5e00]">
        </div>
      </div>
    </div>

    <!-- Doléances à traiter -->
    <div>
      <label class="block text-sm font-semibold text-[#333] mb-2">Doléances à traiter</label>
      <div class="border rounded-lg bg-white overflow-hidden shadow-sm">
        <div class="max-h-64 overflow-y-auto divide-y">
          @foreach ($doleances as $doleance)
            <label class="flex items-center gap-3 px-4 py-3 hover:bg-[#fff0e5] transition cursor-pointer text-sm">
              <input type="checkbox" name="doleances[]" value="{{ $doleance->id }}" class="hidden peer" id="doleance-{{ $doleance->id }}">
              <div class="w-6 h-6 flex items-center justify-center border-2 border-[#fe5e00] rounded-full peer-checked:border-transparent peer-checked:bg-[#fe5e00]">
                <svg xmlns="http://www.w3.org/2000/svg" class="hidden peer-checked:block w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <div>
                <p class="font-medium text-[#333] leading-tight">{{ $doleance->titre }}</p>
                <p class="text-xs text-gray-600 leading-tight">{{ \Carbon\Carbon::parse($doleance->created_at)->format('d/m/Y') }}</p>
              </div>
            </label>
          @endforeach
        </div>
      </div>
      <p class="text-xs text-gray-500 mt-1">Cochez les doléances à inclure dans la réunion.</p>
    </div>

    <!-- Membres de la commission -->
    <div>
      <label class="block text-sm font-semibold text-[#333] mb-2">Sélectionner les membres de la commission</label>
      <div class="border rounded-lg bg-white overflow-hidden shadow-sm">
        <div class="max-h-64 overflow-y-auto divide-y">
          @foreach ($membres as $membre)
            <label class="flex items-center gap-3 px-4 py-3 hover:bg-[#fff0e5] transition cursor-pointer text-sm">
              <input type="checkbox" name="membres[]" value="{{ $membre->id }}" class="hidden peer" id="checkbox-{{ $membre->id }}">
              <div class="w-6 h-6 flex items-center justify-center border-2 border-[#fe5e00] rounded-full peer-checked:border-transparent peer-checked:bg-[#fe5e00]">
                <svg xmlns="http://www.w3.org/2000/svg" class="hidden peer-checked:block w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <div>
                <p class="font-medium text-[#333] leading-tight">{{ $membre->user->nom ?? '' }} {{ $membre->user->prenom ?? '' }}</p>
                <p class="text-xs text-gray-600 leading-tight">{{ $membre->user->email ?? '' }}</p>
              </div>
            </label>
          @endforeach
        </div>
      </div>
      <p class="text-xs text-gray-500 mt-1">Cochez les membres à inclure dans la réunion.</p>
    </div>

    <div class="text-end">
      <button type="submit" class="bg-[#fe5e00] hover:bg-[#e04e00] text-white font-semibold px-8 py-3 rounded-lg transition duration-300 ease-in-out">
        <i class="fas fa-save mr-2"></i> Enregistrer la réunion
      </button>
    </div>
  </form>
</main>

</body>
</html>
