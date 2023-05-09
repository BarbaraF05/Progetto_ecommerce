<div>
    <form wire:submit.prevent="announcementCreate">
         @csrf
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control" wire:model="title">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Descrizione</label>
            <textarea wire:model="body" type="text" col="30" rows="10"></textarea>
            @error('body') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Prezzo</label>
            <input type="decimal" class="form-control" wire:model="price">
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
</div>
