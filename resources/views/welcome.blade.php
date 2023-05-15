<x-layout>
    @if (session()->has('access.denied'))
        <div class="flex flex-row justify-content-center text-center my-2 alert alert-danger">{{session('access.denied')}}</div>
    @endif
    @if (session()->has('message'))
        <div class="flex flex-row justify-content-center my-2 alert alert-success">{{session('message')}}</div>
    @endif
    <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="display-2 text-center fw-bold">Presto.it</h1>
                <p class="h2 my-2 fw-bold text-center">Ecco i nostri annunci più recenti</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 my-4">
                <div class="card shadow" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Titolo: {{$announcement->title}}</h5>
                      <p class="card-text">Descrizione: {{$announcement->body}}</p>
                      <p class="card-text">Prezzo: {{$announcement->price}}€</p>
                      <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-visualizza shadow fw-bold">Visualizza</a>
                      <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="btn btn-category shadow my-3 fw-bold pt-2 card-link">Categoria: {{$announcement->category->name}}</a>
                      <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>