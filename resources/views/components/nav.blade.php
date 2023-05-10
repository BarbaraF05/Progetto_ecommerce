<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
            <a class="nav-link active" aria-current="page" href="{{route('announcement.index')}}">Annunci</a>
          
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
            <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
          </li>
        
          @guest
            <a class="nav-link" href="{{route('login')}}">Accedi</a>
            <a class="nav-link" href="{{route('register')}}">Registrati</a>
          @else
            <a class="nav-link" href="#">{{Auth::user()->name}}</a>
            <a class="nav-link" href="{{route('announcementCreate')}}">Inserisci annuncio</a> 
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                  @csrf
                </form>
                
          @endguest
        </div>
      </div>
    </div>
  </nav>  
        