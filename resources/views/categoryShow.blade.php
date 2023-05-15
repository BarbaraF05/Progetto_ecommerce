<x-layout>
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <h1 class="text-center">
                Esplora la categoria {{$category->name}}
            </h1>
           </div>
           <div class="col-12">
            <div class="row">
                @forelse ($category->announcements as $announcement)
                <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-sec">Titolo: {{$announcement->title}}</h5>
                          <p class="card-text text-sec">Descrizione: {{$announcement->body}}</p>
                          <a href="" class="btn btn-primary shadow text-sec">Visualizza</a>
                          <p class="card-footer text-sec">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
                @empty    
                <div class="col-12">
                    <p class="h1 text-sec">Non sono presenti annunci per questa categoria!</p>
                    <p class="h2 text-sec">Pubblicane uno: <a href="{{route('announcementCreate')}}" class="btn btn-success shadow">Nuovo Annuncio</a></p>
                </div>
                
                    
                @endforelse
            </div>
           </div>
        </div>
    </div>
</x-layout>