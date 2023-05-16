<x-layout>
    <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2 text-center">Annuncio {{$announcement->title}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item-active">
                            <img src="https:picsum.photos/id/27/1200/600" class="img-fluid p-3 rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https:picsum.photos/id/28/1200/600" class="img-fluid p-3 rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https:picsum.photos/id/29/1200/600" class="img-fluid p-3 rounded" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-6 my-3">
                <h5 class="card-title text-sec fw-bold">{{$announcement->title}}</h5>
                <p class="card-text text-sec">{{$announcement->body}}></p>
                <p class="card-text text-sec"><strong>Prezzo:</strong> {{$announcement->price}}€</p>
                <hr>
                <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="category my-2 pt-2 card-link btn text-sec btn-sm">Categoria: {{$announcement->category->name}}</a>
                <p class="card-footer text-sec"><i class="bi bi-calendar2-event"></i> {{$announcement->created_at->format('d/m/Y')}} <br> <i class="bi bi-file-person"></i> {{$announcement->user->name ?? ''}}</p>
            </div>
        </div>
    </div>
</x-layout>