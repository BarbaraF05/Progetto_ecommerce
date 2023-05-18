<x-layout>
    {{-- <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2 text-center">Annuncio {{$announcement->title}}</h1>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid shadow-lg p-3 my-5 bg-body-tertiary rounded">
        <div class="row">
            <div class="col-12 p-5">
                <p class="h2 my-2 fw-bold text-center text-pr">Annuncio: {{$announcement->title}}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    @if ($announcement->images)
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $image)
                          <div class="carousel-item @if($loop->first)active @endif">
                             <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt="">
                          </div>
                        @endforeach
                     </div>
                 @else
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
                 @endif
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
            <div class="col-md-6 col-12 my-3">
                <h5 class="card-title text-sec fw-bold">{{$announcement->title}}</h5>
                <p class="card-text text-sec">{{$announcement->body}}</p>
                <p class="card-text text-sec"><strong>Prezzo:</strong> {{$announcement->price}}€</p>
                <hr class="w-50">
                <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="category my-2 pt-2 card-link btn text-sec btn-sm">{{$announcement->category->name}}</a>
                <p class="card-footer text-sec"><i class="bi bi-calendar2-event"></i> {{$announcement->created_at->format('d/m/Y')}} <br> <i class="bi bi-file-person"></i> {{$announcement->user->name ?? ''}}</p>
            </div>
        </div>
    </div>
</x-layout>