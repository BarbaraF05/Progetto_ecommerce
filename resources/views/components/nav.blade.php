<nav class="navbar navbar-expand-lg bg-body-tertiary bg-nav text-style-decoration-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="">
        <img src="../../img/logo-bianco.png" alt="Logo" width="90" height="80" class="d-inline-block align-text-top">
      </a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          
            <a class="nav-link active text-white" aria-current="page" href="{{route('welcome')}}">Home</a>
            <a class="nav-link text-white" aria-current="page" href="{{route('announcement.index')}}">Annunci</a>
          
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
            <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
          </li>
        
          @guest
            <a class="nav-link text-white" href="{{route('login')}}">Accedi</a>
            <a class="nav-link text-white" href="{{route('register')}}">Registrati</a>
          @else
            <a class="nav-link text-white" href="#">{{Auth::user()->name}}</a>
            <a class="nav-link text-white" href="{{route('announcementCreate')}}">Inserisci annuncio</a> 
            @if(Auth::user()->is_revisor)
              <a href="{{route('revisor.index')}}" class="nav-link btn btn-outline-success btn-sm position-relative text-white" aria-current="page">
              Zona revisore
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">Da leggere</span>
              </span>
              </a>
            @endif  
            <a class="nav-link text-white" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                  @csrf
                </form>
          @endguest
          <form action="{{route('announcements.search')}}" method="GET" class="d-flex" role="search">
            <input name="searched" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
      
    </div>
  </nav>  
        