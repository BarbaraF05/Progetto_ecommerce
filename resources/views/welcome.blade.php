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
                <p class="h2 my-2 fw-bold text-sec text-end">{{__('ui.allAnnouncements')}}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,600) : 'https://picsum.photos/200' }}" class="card-img-top p-3 rounded" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-sec fw-bold">{{$announcement->title}}</h5>
                      <p class="card-text text-sec">{{$announcement->body}}</p>
                      <hr>
                      <p class="card-text text-sec">{{__('ui.prezzo')}}: {{$announcement->price}}€</p>
                      <div class="d-grid gap-2 d-md-block">
                       <a href="{{route('announcement.show', compact('announcement'))}}" class="visualizza btn shadow my-3 text-sec btn-sm d-grid">{{__('ui.visualizza')}}</a>
                       <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="category btn shadow my-3 card-link text-sec btn-sm d-grid ">{{$announcement->category->name}}</a>
                      </div>
                      <p class="card-footer text-sec"><i class="bi bi-calendar2-event"></i>  {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>