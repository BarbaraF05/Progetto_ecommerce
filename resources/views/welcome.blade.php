<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Presto.it</h1>
                <p class="h2 my-2 fw-bold">Ecco i nostri annunci più recenti</p>
            </div>
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 my-4">
                <div class="card shadow" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Titolo: {{$announcement->title}}</h5>
                      <p class="card-text">Descrizione: {{$announcement->body}}</p>
                      <p class="card-text">Prezzo: {{$announcement->price}}€</p>
                      <a href="" class="btn btn-primary shadow">Visualizza</a>
                      <a href="" class="btn btn-success shadow my-2 border-top pt-2 border-dark card-link">Categoria: {{$announcement->category->name}}</a>
                      <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>