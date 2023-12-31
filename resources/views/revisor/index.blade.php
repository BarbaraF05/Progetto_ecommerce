<x-layout>
    {{-- <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2 text-center text-pr">{{$announcement_to_check ? "Ecco l'annuncio da revisionare" : "Non ci sono annunci da revisionare"}}</h1>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid shadow-lg p-3 my-5 bg-body-tertiary rounded">
        <div class="row">
            <div class="col-12 p-5">
                <p class="h2 my-2 fw-bold text-center text-pr display-5">{{$announcement_to_check ? "Ecco l'annuncio da revisionare" : "Non ci sono annunci da revisionare"}}</p>
            </div>
        </div>
    </div>
    @if ($announcement_to_check)
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6 col-12">
                <div id="showCarousel" class="carousel slide justify-content-center" data-bs-ride="carousel">
                    @if ($announcement_to_check->images)
                       <div class="carousel-inner">
                           @foreach ($announcement_to_check->images as $image)
                             <div class="carousel-item @if($loop->first)active @endif ">
                                <img src="{{$image->getUrl(500,600)}}" class="w-100 p-3 rounded" alt="">
                                {{-- <div class="border-revisor row mt-4">
                                    <div class="col-md-6 col-12 text-center">
                                        <h5>Tags</h5>
                                        <div class="p-2">
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                <p class="d-inline">{{$label}}</p>
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h5>Revisione Immagini</h5>
                                        <p>Adulti: <span class="{{$image->adult}}"> </span></p>
                                        <p>Satira: <span class="{{$image->spoof}}"> </span></p>
                                        <p>Medicina: <span class="{{$image->medical}}"> </span></p>
                                        <p>Violenza: <span class="{{$image->violence}}"> </span></p>
                                        <p>Contenuto ammiccante: <span class="{{$image->racy}}"> </span></p>
                                    </div>
                                </div> --}}
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
                        <span class="btn-carousel carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="btn-carousel carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="info-text col-md-6 col-12 my-4 d-flex flex-column align-items-center">
                <h4 class="card-title text-sec fw-bold">{{$announcement_to_check->title}}</h4>
                <p class="card-text text-sec mt-3">{{$announcement_to_check->body}}</p>
                <p class="card-text text-sec mt-3">Da <span class="card-text text-sec mt-3 fw-bold">{{Auth::user()->name}}</span></p>
                <hr class="hr-revisor w-50">
                <p class="card-footer text-sec"><i class="bi bi-calendar2-event"></i>{{$announcement_to_check->created_at->format(' d/m/Y')}}</p>
            
                <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="accetta btn m-2 text-sec">Accetta</button>
                </form>
                <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="rifiuta btn m-2 text-sec">Rifiuta</button>
                    </form>
                    @if ($announcement_to_check->images)
                       <div class="border-revisor row mt-5">
                            <div class="border-revisor-tags col-md-6 col-12 text-center mt-2">
                                <h5>Tags</h5>
                                <div class="p-2">
                                @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                        <p class="d-inline">{{$label}}</p>
                                     @endforeach
                                @endif
                                </div>
                            </div>
                            <div class="border-revisor-img col-md-6 col-12 text-center mt-2">
                                <h5>Revisione Immagini</h5>
                                <p>Adulti: <span class="{{$image->adult}}"> </span></p>
                                <p>Satira: <span class="{{$image->spoof}}"> </span></p>
                                <p>Medicina: <span class="{{$image->medical}}"> </span></p>
                                <p>Violenza: <span class="{{$image->violence}}"> </span></p>
                                <p>Contenuto ammiccante: <span class="{{$image->racy}}"> </span></p>
                            </div>
                        </div>
                    @endif            
                </div>  
        </div>
    </div>
    @endif
</x-layout>    
   
    
                
               