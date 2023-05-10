<div>

    @if (session()->has('message'))
        <div class="flex flex-row justify-content-center my-2 alert alert-success">{{session('message')}}</div>
    @endif

    <form wire:submit.prevent="announcementCreate">
         @csrf
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" wire:model="text">
            @error ('text') {{$message}} @enderror
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Descrizione</label>
            <textarea wire:model="body" type="text" col="30" rows="10" class="form-control @error('body') is-invalid @enderror">@error ('body') {{$message}} @enderror</textarea>
            
            
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

