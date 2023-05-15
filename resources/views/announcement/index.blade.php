<x-layout>
    <div class="container-fluid shadow-lg p-3 my-5 bg-body-tertiary rounded">
        <div class="row">
            <div class="col-12 p-5">
                <p class="h2 my-2 fw-bold text-center">Ecco i nostri annunci</p>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">Titolo: {{$announcement->title}}</h5>
                                  <p class="card-text">Descrizione: {{$announcement->body}}</p>
                                  <p class="card-text">Prezzo: {{$announcement->price}}€</p>
                                  <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-primary shadow">Visualizza</a>
                                  <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="btn btn-success shadow my-2 border-top pt-2 border-dark card-link">Categoria: {{$announcement->category->name}}</a>
                                  <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore:{{$announcement->user->name ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-warning py-3 shadow">
                                <p class="lead">
                                    Non ci sono annunci per questa ricerca. Prova a cambiarla!
                                </p>
                            </div>
                        </div>
                        @endforelse
                        {{$announcements->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>