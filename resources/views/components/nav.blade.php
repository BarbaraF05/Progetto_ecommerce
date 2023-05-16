<nav class="navbar navbar-expand-lg bg-body-tertiary bg-nav text-style-decoration-white">
    <div class="container-fluid">
      <div>
        <a class="navbar-brand" href="">
          <img src="../../img/logo-bianco.png" alt="Logo" width="90" height="80" class="d-inline-block align-text-top">
        </a>
       
      </div>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          
            <a class="nav-link active text-white text-sec" aria-current="page" href="{{route('welcome')}}">Home</a>
            <a class="nav-link text-white text-sec" aria-current="page" href="{{route('announcement.index')}}">Annunci</a>
          
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white text-sec" href="" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
            <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
          </li>
        
          @guest
            <a class="nav-link text-white text-sec" href="{{route('login')}}">Accedi</a>
            <a class="nav-link text-white text-sec" href="{{route('register')}}">Registrati</a>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white text-sec" href="" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-emoji-sunglasses-fill"></i> {{Auth::user()->name}}</a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
              <li><a class="nav-link text-danger text-sec" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a><form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>  
          </li> 
            <a class="nav-link text-white text-sec" href="{{route('announcementCreate')}}">Inserisci annuncio</a> 
            @if(Auth::user()->is_revisor)
              <a href="{{route('revisor.index')}}" class="revisor nav-link btn-sm position-relative" aria-current="page">
              Zona revisore
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-sec">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">Da leggere</span>
              </span>
              </a>
            @endif  
            
                
          @endguest
          
        </div>
          <div class="search ms-auto">
            <form action="{{route('announcements.search')}}" method="GET" class="d-flex" role="search">
              <input name="searched" class="form-control me-2 search-input-nav border-0 rounded-0 text-white" type="search" placeholder="Cerca" aria-label="Search">
              <button class="btn " type="submit">Cerca</button>
            </form>
          </div>
        </div> 
    </div>
  </nav>  
        