<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="my-4 fw-bold text-pr">Accedi</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action='{{route('login')}}'>
                    @csrf
                    <div class="mb-3 w-50 mx-auto">
                        <label class="line-title form-label text-sec">Email</label>
                        <input type="email" class="form-control rounded-0 form-line border-0" name="email">
                    </div>
                    <div class="mb-3 w-50 mx-auto">
                        <label class="line-title form-label text-sec">Password</label>
                        <input type="password" class="form-control rounded-0 form-line border-0" name="password">
                    </div>
                    <button type="submit" class="form btn mx-auto text-sec">Accedi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>