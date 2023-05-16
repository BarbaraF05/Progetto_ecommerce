<div>

    @if (session()->has('message'))
        <div class="flex flex-row justify-content-center my-2 alert alert-success">{{session('message')}}</div>
    @endif

    <form wire:submit.prevent="announcementCreate">
         @csrf
        <div class="my-3 w-50 mx-auto">
            <label class="form-label fw-bold">Titolo</label>
            <input type="text" class="form-control rounded-0 form-line border-0 @error('title') is-invalid @enderror" wire:model="title">
            @error ('title') {{$message}} @enderror
        </div>
        <div class="my-3 w-50 mx-auto">
            <label class="form-label fw-bold d-block">Descrizione</label>
            <textarea wire:model="body" type="text" col="30" rows="5" class="form-control rounded-0 form-line border-0 @error('body') is-invalid @enderror"></textarea>
            @error ('body') {{$message}} @enderror
            
        </div>
        <div class="my-3 w-50 mx-auto">
            <label class="form-label fw-bold">Prezzo</label>
            <input type="decimal" class="form-control rounded-0 form-line border-0 @error('price') is-invalid @enderror" wire:model="price">
            @error ('price') {{$message}} @enderror
            {{-- @error('price') <span class="error">{{ $message }}</span> @enderror --}}
        </div>
        <div class="my-3 w-50 mx-auto">
            <label for="category" class="mb-2 fw-bold">Categoria</label>
            <select wire:model.defer="category" id="category" class="form-control rounded-0 form-line border-0">
                <option value="">Scegli la categoria</option>
                @foreach ($categories as $category)

                <option value="{{$category->id}}">{{$category->name}}</option>
                    
                @endforeach
            </select>

        </div>
        <button type="submit" class="form btn">Aggiungi</button>
    </form>
{{-- ciao --}}
</div>

