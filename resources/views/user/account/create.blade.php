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
                <!-- Populate with banks -->
            </select>
        </div>
        <div>
            <label for="id_currency">Devise</label>
            <select id="id_currency" name="id_currency" required>
                <!-- Populate with currencies -->
            </select>
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection