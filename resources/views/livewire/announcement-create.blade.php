<div>

    @if (session()->has('message'))
        <div class="flex flex-row justify-content-center my-2 alert alert-success">{{session('message')}}</div>
    @endif

    <form wire:submit.prevent="announcementCreate">
         @csrf
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control " wire:model="title">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Descrizione</label>
            <textarea wire:model="body" type="text" col="30" rows="10"></textarea>
            @error('body') <span class="error d-block"><p class="text-danger">{{ $message }}</p></span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Prezzo</label>
            <input type="decimal" class="form-control @error('price') is-invalid @enderror" wire:model="price">
            @error ('price') {{$message}} @enderror
            {{-- @error('price') <span class="error">{{ $message }}</span> @enderror --}}
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>

</div>

{{-- x ricordarmi: -il price fa diventare il controrno rosso che fa notare di più l'errore. -ho avuto l'idea di mettere il messaggio all'interno di un <p> cosi da poterlo mettere rosso --}}
