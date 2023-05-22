<x-layout>
    {{-- <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <h1 class="text-center text-pr m-4">
                Esplora la categoria {{$category->name}}
            </h1>
           </div> --}}

        <div class="container-fluid shadow-lg p-3 my-5 bg-body-tertiary rounded">
            <div class="row">
                <div class="col-12 p-5">
                    <p class="h2 my-2 fw-bold text-center text-pr display-5">Esplora la categoria {{$category->name}}</p>
                </div>
            </div>
        </div>
           <div class="col-12">
            <div class="row">
                @forelse ($category->announcements->where('is_accepted',true)->sortByDesc('created_at') as $announcement)
                <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200' }}" class="card-img-top p-3 rounded" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-sec fw-bold">{{$announcement->title}}</h5>
                          <p class="card-text text-sec">{{$announcement->body}}</p>
                          <hr>
                          <a href="{{route('announcement.show', compact('announcement'))}}" class="visualizza btn text-sec mb-3 btn-sm d-grid">Visualizza</a>
                          <p class="card-footer text-sec"><i class="bi bi-calendar2-event"></i> {{$announcement->created_at->format('d/m/Y')}} - <i class="bi bi-file-person"></i> {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
                @empty    
                <div class="col-12 mt-4">
                    <p class="h2 text-sec text-center">Non sono presenti annunci per questa categoria!</p>
                    <p class="text-sec text-center m-3"><a href="{{route('announcementCreate')}}" class="newAnn btn text-sec">Nuovo Annuncio</a></p>
                </div>
                @endforelse
            </div>
           </div>
        </div>
    </div>
</x-layout>