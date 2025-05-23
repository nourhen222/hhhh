<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mes Doléances</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background-color: #fff0e5;
    }

    .sidebar {
      width: 240px;
      background-color: white;
      padding: 20px;
      position: fixed;
      height: 100%;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar .logo img {
      width: 60px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      gap: 15px;
      color: #000;
      text-decoration: none;
      padding: 12px 15px;
      margin: 4px 0;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sidebar a:hover {
      background-color: #fff0e5;
      transform: translateX(5px);
    }

    .sidebar a i {
      width: 25px;
      text-align: center;
      font-size: 1.1rem;
      color: #fe5e00;
    }

    .sidebar .logout-section {
      margin-top: auto;
      padding-top: 20px;
      border-top: 1px solid #eee;
    }

    .sidebar .logout-section a {
      color: #dc3545 !important;
    }

    .sidebar .logout-section a:hover {
      background-color: #f8d7da;
    }

    .content {
      flex-grow: 1;
      margin-left: 240px;
      display: flex;
      flex-direction: column;
    }

    .topbar {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      background-color: white;
      padding: 15px 30px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: relative;
    }

    .notif-container {
      position: relative;
      margin-right: 20px;
    }

    .notif-btn {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: #333;
      position: relative;
    }

    .notif-btn .badge {
      position: absolute;
      top: -6px;
      right: -6px;
      background-color: red;
      color: white;
      font-size: 10px;
      border-radius: 50%;
      padding: 2px 5px;
    }

    .notif-menu {
      position: absolute;
      right: 0;
      top: 40px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 250px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: none;
      z-index: 1000;
    }

    .notif-menu.active {
      display: block;
    }

    .notif-menu h4 {
      margin: 0;
      padding: 10px;
      border-bottom: 1px solid #eee;
      font-size: 16px;
      background-color: #f7f7f7;
    }

    .notif-item {
      padding: 10px;
      border-bottom: 1px solid #eee;
      font-size: 14px;
      cursor: pointer;
    }

    .notif-item:hover {
      background-color: #f0f0f0;
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .stats-cards {
      display: flex;
      justify-content: space-around;
      margin: 30px;
    }

    .stat-card {
      flex: 1;
      margin: 0 10px;
      background-color: white;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
  text-decoration: none;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-card.waiting { border-top: 4px solid #E83F25; }
    .stat-card.in-progress { border-top: 4px solid #ff7f10;} 
    .stat-card.done { border-top: 4px solid #2ecc71; }
    
    .stat-card.in-progress h3 {
  color: #333;
}
.stat-card.waiting h3 {
  color: #333;
}
.stat-card.done  h3 {
  color: #333;
}
.stat-card.in-progress.filter-active h3 {
  color: #ff7f10; /* ou la couleur que tu veux */
}
.stat-card.waiting.filter-active h3 {
  color: #E83F25;
}
.stat-card.done.filter-active h3 {
  color:#2ecc71;
}
    .complaints {
      margin: 20px;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
    }
      /* Ajouts CSS pour le tableau */
      .complaints-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .complaints-table th,
    .complaints-table td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    .complaints-table th {
      background-color: #f8f9fa;
      font-weight: 600;
      color: black;
      
    }

    .complaints-table tr:hover {
      background-color: #fffaf5;
      
    }

    .status-badge {
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 0.85em;
      font-weight: 500;
    }

    .status-rejected { background-color: #ffe0e0; color: #dc3545; }
    .status-pending { background-color: #fff3d5; color: #e67e22; }
    .status-resolved { background-color: #e0f2e9; color: #2ecc71; }

    .filter-active {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .search-bar form {
  display: flex;
  gap: 8px;
}

.search-bar .form-control {
  flex-grow: 1;
  padding: 10px 14px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 0.95rem;
  transition: border-color 0.2s;
}

.search-bar .form-control:focus {
  outline: none;
  border-color: #fe5e00;
  box-shadow: 0 0 5px rgba(254,94,0,0.3);
}

/* Bouton de recherche */
.btn-search {
  background-color: #fe5e00;
  border: none;
  color: #fff;
  padding: 0 16px;
  border-radius: 8px;
  font-size: 1rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  transition: background-color 0.2s, transform 0.1s;
}

.btn-search i {
  margin: 0;
}

/* Hover & active */
.btn-search:hover {
  background-color: #e65400;
  transform: translateY(-1px);
}

.btn-search:active {
  background-color: #c54800;
  transform: translateY(1px);
}

/* Bouton rafraîchir assorti */
.btn-refresh {
  background-color: #fff;
  border: 1px solid #ccc;
  color: #333;
  padding: 0 12px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  transition: background-color 0.2s, border-color 0.2s;
  text-decoration: none;
}

.btn-refresh i {
  font-size: 1rem;
}

.btn-refresh:hover {
  background-color: #fff0e5;
  border-color: #fe5e00;
  color: #fe5e00;
}
.btn-detail {
  display: inline-block;
  background-color: #007bff;
  color: white;
  padding: 6px 12px;
  border-radius: 5px;
  text-decoration: none;
  font-size: 0.85rem;
  transition: background-color 0.2s;
}

.btn-detail:hover {
  background-color: #0056b3;
}

.status-badge {
  padding: 4px 12px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 0.9rem;
  text-transform: capitalize;
}

.status-en_cours {
  color: #e67e22; /* Orange */
}

.status-traitee {
  color: #2ecc71; /* Vert */
}

.status-rejetee {
  color: #dc3545; /* Rouge */
}


  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo"><img src="{{ asset('images/Sonatrach.svg') }}" alt="Logo"/></div>
    <a href="{{ route('doleances.create') }}"><i class="fas fa-paper-plane"></i><span>Soumettre une doléance</span></a>
    <a href="{{ route('doleances.index') }}"><i class="fas fa-inbox"></i><span>Mes doléances</span></a>
    <div class="logout-section">
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i><span>Déconnexion</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
    </div>
  </div>

  <div class="content">
    {{-- Topbar --}}
    <div class="topbar">
      <div class="notif-container">
        <button class="notif-btn" onclick="document.getElementById('notifMenu').classList.toggle('active')">
          <i class="fas fa-bell"></i>
          <span class="badge">3</span>
        </button>
        <div class="notif-menu" id="notifMenu">
          <h4>Notifications</h4>
          <div class="notif-item">Nouvelle doléance reçue</div>
          <div class="notif-item">Doléance #21 mise à jour</div>
          <div class="notif-item">Réunion ajoutée demain</div>
        </div>
      </div>
      <div class="profile">
        <img src="{{ asset('images/profile.png') }}" alt="Profile"/>
        <span>{{ Auth::user()->name }}</span>
      </div>
    </div>

    {{-- Statistiques / Filtres --}}
    <div class="stats-cards">
      <a href="{{ route('doleances.index', array_merge(request()->all(), ['statut'=>'rejete','page'=>1])) }}"
         class="stat-card waiting {{ request('statut')=='rejete'?'filter-active':'' }}">
        <h3>Rejeté</h3>
        <p>{{ $stats['rejected'] }}</p>
      </a>
      <a href="{{ route('doleances.index', array_merge(request()->all(), ['statut'=>'en_cours','page'=>1])) }}"
         class="stat-card in-progress {{ request('statut')=='en_cours'?'filter-active':'' }}">
        <h3>En cours</h3>
        <p>{{ $stats['pending'] }}</p>
      </a>
      <a href="{{ route('doleances.index', array_merge(request()->all(), ['statut'=>'traitee','page'=>1])) }}"
         class="stat-card done {{ request('statut')=='traitee'?'filter-active':'' }}">
        <h3>Traitée</h3>
        <p>{{ $stats['resolved'] }}</p>
      </a>
      <a href="{{ route('doleances.index') }}"
         class="stat-card {{ !request('statut')?'filter-active':'' }}">
        <h3>Toutes</h3>
        <p>{{ $doleances->total() }}</p>
      </a>
    </div>

    {{-- Recherche --}}
    <div class="complaints">
    <div class="search-bar">
  <form method="GET" action="{{ route('doleances.index') }}" class="d-flex">
    <input type="text" name="search" value="{{ request('search') }}"
           class="form-control" placeholder="Rechercher…">
    @foreach(request()->only(['sort','dir','statut']) as $k=>$v)
      <input type="hidden" name="{{ $k }}" value="{{ $v }}">
    @endforeach

    {{-- Nouveau bouton de recherche --}}
    <button type="submit" class="btn-search">
      <i class="fas fa-search"></i>
    </button>
    
    {{-- Rafraîchir --}}
    <a href="{{ route('doleances.index') }}" class="btn-refresh">
      <i class="fas fa-sync-alt"></i>
    </a>
  </form>
</div>


      {{-- Tableau --}}
      <table class="complaints-table">
        <thead>
          <tr>
            @php
              $dir = request('sort')==='id'&&request('dir')==='asc'?'desc':'asc';
            @endphp
            <th>
              <a href="{{ route('doleances.index', array_merge(request()->all(), ['sort'=>'id','dir'=>$dir])) }}">
                # @if(request('sort')==='id')
                  <i class="fas fa-sort-{{ request('dir')==='asc'?'up':'down' }}"></i>
                @else <i class="fas fa-sort"></i> @endif
              </a>
            </th>


            @php $dDate = request('sort')==='created_at'&&request('dir')==='asc'?'desc':'asc'; @endphp
            <th>
              <a href="{{ route('doleances.index', array_merge(request()->all(), ['sort'=>'created_at','dir'=>$dDate])) }}">
                Date @if(request('sort')==='created_at')
                  <i class="fas fa-sort-{{ request('dir')==='asc'?'up':'down' }}"></i>
                @else <i class="fas fa-sort"></i> @endif
              </a>
            </th>

            @php $dTitre = request('sort')==='titre'&&request('dir')==='asc'?'desc':'asc'; @endphp
            <th>
              <a href="{{ route('doleances.index', array_merge(request()->all(), ['sort'=>'titre','dir'=>$dTitre])) }}">
                Objet @if(request('sort')==='titre')
                  <i class="fas fa-sort-{{ request('dir')==='asc'?'up':'down' }}"></i>
                @else <i class="fas fa-sort"></i> @endif
              </a>
            </th>

            @php $dStatut = request('sort')==='statut'&&request('dir')==='asc'?'desc':'asc'; @endphp
            <th>
              <a href="{{ route('doleances.index', array_merge(request()->all(), ['sort'=>'statut','dir'=>$dStatut])) }}">
                Statut @if(request('sort')==='statut')
                  <i class="fas fa-sort-{{ request('dir')==='asc'?'up':'down' }}"></i>
                @else <i class="fas fa-sort"></i> @endif
              </a>
            </th>
            <th>Action</th> <!-- ✅ colonne ajoutée -->

          </tr>
        </thead>
        <tbody>
          @forelse($doleances as $d)
            <tr>
              <td>{{ $d->id }}</td>
             
              <td>{{ $d->created_at->format('d/m/Y H:i') }}</td>
              <td>{{ $d->titre }}</td>
              <td>
              @php
  $icons = [
    'en_cours' => '⏳',
    'traitee' => '✅',
    'rejetee' => '❌',
  ];
@endphp

<span class="status-badge status-{{ $d->statut }}">
  {{ $icons[$d->statut] ?? '' }} {{ ucfirst(str_replace('_',' ', $d->statut)) }}
</span>

              </td>
              <td>
  <a href="{{ route('doleances.show', $d->id) }}" class="btn-detail">
    <i class="fas fa-eye"></i> Détail
  </a>
</td>

            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">Aucune doléance trouvée.</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      {{-- Pagination --}}
      <div class="d-flex justify-content-center mt-3">
        {{ $doleances->appends(request()->all())->links() }}
      </div>
    </div>
  </div>
</body>
  <script>
// Variables globales
let currentFilter = 'all';
let currentPage = 1;
let currentSort = 'created_at';
let currentDir = 'desc';
let currentSearch = '';

// Fonction principale de chargement
async function loadComplaints() {
    const url = new URL('{{ route("doleances.index") }}');
    const params = {
        status: currentFilter,
        search: currentSearch,
        sort: currentSort,
        dir: currentDir,
        page: currentPage
    };

    Object.entries(params).forEach(([key, value]) => {
        if (value) url.searchParams.append(key, value);
    });

    try {
        // Afficher le loader
        document.getElementById('complaintsBody').innerHTML = `
            <tr>
                <td colspan="5" class="loading-text">Chargement en cours...</td>
            </tr>`;

        const response = await fetch(url);
        const data = await response.json();

        // Mettre à jour le tableau et les stats
  // Créer un conteneur temporaire pour parser le HTML reçu
  const tempDiv = document.createElement('div');
        tempDiv.innerHTML = data.html;

        // Mettre à jour le corps du tableau
        const newTbody = tempDiv.querySelector('tbody');
        if (newTbody) {
            document.getElementById('complaintsBody').innerHTML = newTbody.innerHTML;
        }

        // Mettre à jour la pagination
        const newPagination = tempDiv.querySelector('#paginationLinks');
        if (newPagination) {
            document.getElementById('paginationLinks').innerHTML = newPagination.innerHTML;
        }
        updateStats(data.stats);
        updateActiveFilter();
        
    } catch (error) {
        console.error('Erreur:', error);
        document.getElementById('complaintsBody').innerHTML = `
            <tr>
                <td colspan="5" class="error-text">Erreur de chargement des données</td>
            </tr>`;
    }
}

function updateStats(stats) {
    document.getElementById('rejectedCount').textContent = stats.rejected;
    document.getElementById('pendingCount').textContent = stats.pending;
    document.getElementById('resolvedCount').textContent = stats.resolved;
}

function filterComplaints(status) {
    currentFilter = status;
    currentPage = 1;
    loadComplaints();
}

function sortTable(column) {
    if (currentSort === column) {
        currentDir = currentDir === 'asc' ? 'desc' : 'asc';
    } else {
        currentSort = column;
        currentDir = 'asc';
    }
    loadComplaints();
}

// Recherche avec anti-rebond
const debounceSearch = debounce(() => {
    currentSearch = document.getElementById('searchInput').value;
    currentPage = 1;
    loadComplaints();
}, 300);

function updateActiveFilter() {
    document.querySelectorAll('.stat-card').forEach(card => {
        card.classList.remove('filter-active');
        if (card.dataset.status === currentFilter) {
            card.classList.add('filter-active');
        }
    });
}

// Gestionnaire d'événements pour la pagination
document.addEventListener('click', (e) => {
    const paginationLink = e.target.closest('.pagination a');
    if (paginationLink) {
        e.preventDefault();
        currentPage = new URL(paginationLink.href).searchParams.get('page');
        loadComplaints();
    }
});

// Fonction debounce
function debounce(func, wait) {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
    loadComplaints();
    document.getElementById('searchInput').addEventListener('input', debounceSearch);
});
</script>
</body>
</html>