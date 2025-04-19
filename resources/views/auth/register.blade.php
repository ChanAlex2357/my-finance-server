@extends("layouts.base")

@section("content")
    <h1>Se connecter</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.doregister') }}" method="post" class="vstack gap-3">
                @csrf
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

                <h2>Information personnelles</h2>
                <div class="form-group">
                    <label for="name">Prenom(s)</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_date">Date de naissance</label>
                    <input type="date" name="birth_date" class="form-control" id="birth_date" value="{{ old('birth_date') }}">
                    @error('birth_date')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="salary">Salaire</label>
                    <input type="number" step="0.1" value="0" min="0" name="salary" class="form-control" id="salary" value="{{ old('salary') }}">
                    @error('salary')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="professional_status">Status professionnel</label>
                    <select name="professional_status" id="professional_status">
                        <option value="">Votre status actuelle</option>
                        @foreach ( $status as $st)
                            <option value="{{ $st->id }}">{{ $st->val}}</option>                            
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="se connecter">
                </div>
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <p>Vous avez deja un compte ? <a href="{{ route('auth.login') }}">Connectez-vous</a></p>
        </div>
    </div>
@endsection