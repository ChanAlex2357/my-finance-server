<!-- filepath: d:\JACQUES Chan Alex\Finance-app\my-finance-server\resources\views\user\account\create.blade.php -->
@extends('layouts.user')

@section('content')
    <h1>Créer un compte</h1>
    <form action="{{ route('user.account.create') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom du compte</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="id_bank">Banque</label>
            <select id="id_bank" name="id_bank" required>
                @foreach ($banks as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="id_currency">Devise</label>
            <select id="id_currency" name="id_currency" required>
                @foreach ($currencies as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->val }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection