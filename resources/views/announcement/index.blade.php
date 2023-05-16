<x-layout>
    <div class="container-fluid shadow-lg p-3 my-5 bg-body-tertiary rounded">
        <div class="row">
            <div class="col-12 p-5">
                <p class="h2 my-2 fw-bold text-center text-pr">Ecco i nostri annunci</p>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title text-sec fw-bold">{{$announcement->title}}</h5>
                                  <p class="card-text text-sec">{{$announcement->body}}</p>
                                  <p class="card-text text-sec">Prezzo: {{$announcement->price}}€</p>
                                  <hr>
                                  <a href="{{route('announcement.show', compact('announcement'))}}" class="visualizza btn text-sec btn-sm">Visualizza</a>
                                  <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="category btn my-2 pt-2 card-link text-sec btn-sm">{{$announcement->category->name}}</a>
                                  <p class="card-footer text-sec"><i class="bi bi-calendar2-event"></i> {{$announcement->created_at->format('d/m/Y')}} - <i class="bi bi-file-person"></i>{{$announcement->user->name ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-warning py-3 shadow">
                                <p class="lead text-sec">
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