<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="my-4 fw-bold text-pr">Registrati</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action='{{route('register')}}'>
                    @csrf
                    <div class="mb-3 w-50 mx-auto">
                        <label class="form-label text-sec">UserName</label>
                        <input type="text" class="form-control rounded-0 search-input-nav border-0" name="name">
                    </div>
                    <div class="mb-3 w-50 mx-auto">
                        <label class="form-label text-sec">Email</label>
                        <input type="email" class="form-control rounded-0 search-input-nav border-0" name="email">
                    </div>
                    <div class="mb-3 w-50 mx-auto">
                        <label class="form-label text-sec">Password</label>
                        <input type="password" class="form-control rounded-0 search-input-nav border-0" name="password">
                    </div>
                    <div class="mb-3 w-50 mx-auto">
                        <label class="form-label text-sec">Conferma Password</label>
                        <input type="password" class="form-control rounded-0 search-input-nav border-0" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-register fw-bold mx-auto text-sec">Registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>