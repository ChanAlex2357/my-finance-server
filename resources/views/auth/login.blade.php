@extends("layouts.base")

@section("content")
    <h1>Se connecter</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">

                @error('email')
                        {{ $message }}
                    @enderror
                </div>
        </form>
        </div>
    </div>
@endsection