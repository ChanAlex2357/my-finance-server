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
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="se connecter">
                </div>
        </form>
        </div>
    </div>
@endsection