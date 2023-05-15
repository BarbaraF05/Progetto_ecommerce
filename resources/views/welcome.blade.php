<x-layout>
    @if (session()->has('access.denied'))
        <div class="flex flex-row justify-content-center text-center my-2 alert alert-danger">{{session('access.denied')}}</div>
    @endif
    @if (session()->has('message'))
        <div class="flex flex-row justify-content-center my-2 alert alert-success">{{session('message')}}</div>
    @endif
    <div class="container-fluid p-5 shadow mb-4 bg-img">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="display-1 text-end me-5 text-pr fw-bold">Presto.it</h1>
                <p class="h2 my-2 fw-bold text-sec text-end">Ecco i nostri annunci più recenti</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-sec">Titolo: {{$announcement->title}}</h5>
                      <p class="card-text text-sec">Descrizione: {{$announcement->body}}</p>
                      <p class="card-text text-sec">Prezzo: {{$announcement->price}}€</p>
                      <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-visualizza shadow fw-bold text-sec">Visualizza</a>
                      <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="btn btn-category shadow my-3 fw-bold pt-2 card-link text-sec">Categoria: {{$announcement->category->name}}</a>
                      <p class="card-footer text-sec">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>