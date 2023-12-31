<nav class="navbar navbar-expand-lg bg-body-tertiary bg-nav text-style-decoration-white">
    <div class="container-fluid">
      <div>
        <a class="navbar-brand" href="">
          <img src="../../img/logo-bianco.png" alt="Logo" width="90" height="80" class="d-inline-block align-text-top">
        </a>
       
      </div>
      <button class="btn-toogle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          
            <a class="nav-link active text-white text-sec" aria-current="page" href="{{route('welcome')}}"><i class="bi bi-house"></i> {{__('ui.home')}}</a>
            <a class="nav-link text-white text-sec" aria-current="page" href="{{route('announcement.index')}}"><i class="bi bi-clipboard"></i> {{__('ui.annunci')}}</a>
          
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white text-sec" href="" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-tags"></i> {{__('ui.categorie')}}</a>
          
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
            <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
          </li>
        
          @guest
            <a class="nav-link text-white text-sec" href="{{route('login')}}"> <i class="bi bi-box-arrow-right"></i> {{__('ui.accedi')}}</a>
            <a class="nav-link text-white text-sec" href="{{route('register')}}"><i class="bi bi-person-add"></i> {{__('ui.register')}}</a>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white text-sec" href="" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> {{Auth::user()->name}}</a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
              <li><a class="nav-link text-danger text-sec" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-in-left"></i> {{__('ui.disconetti')}}</a><form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>  
          </li> 
            <a class="nav-link text-white text-sec" href="{{route('announcementCreate')}}"><i class="bi bi-pencil-square"></i> {{__('ui.insannuncio')}}</a> 
            @if(Auth::user()->is_revisor)
              <a href="{{route('revisor.index')}}" class="revisor nav-link btn-sm position-relative" aria-current="page">
                <i class="bi bi-clipboard-check"></i> {{__('ui.zrev')}}
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-sec">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">{{__('ui.daleggere')}}</span>
              </span>
              </a>
            @endif
          @endguest  

        </div>
        <div class="language dropdown m-3">
          <button class="btn-language btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-globe-central-south-asia"></i> {{__('ui.language')}}
          </button>
          <ul class="ul-lang dropdown-menu mt-4">
            <li><x-_locale lang="it" />IT</li>
            <hr class="line-lang">
            <li><x-_locale lang="en" />EN</li>
            <hr class="line-lang">
            <li><x-_locale lang="es" />ES</li>
          </ul>
        </div>
          <div class="search ms-auto">
            <form action="{{route('announcements.search')}}" method="GET" class="d-flex" role="search">
              <div class="input-group mb-3">
                <input name="searched" class="form-control me-2 search-input-nav border-0 rounded-0 text-white" type="search" placeholder="es:Lampada" aria-label="Search">
                <button class="btn rounded" type="submit"><i class="bi bi-search"></i> {{__('ui.cerca')}}</button>
              </div>
            </form>
          </div>
        </div> 
    </div>
  </nav>  
        