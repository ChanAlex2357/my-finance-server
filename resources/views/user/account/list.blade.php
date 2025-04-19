<!-- filepath: d:\JACQUES Chan Alex\Finance-app\my-finance-server\resources\views\user\account\list.blade.php -->
@extends('layouts.user')

@section('content')
    <h1>Liste des comptes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actif</th>
                <th>Banque</th>
                <th>Devise</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->is_active ? 'Oui' : 'Non' }}</td>
                    <td>{{ $account->bank->name }}</td>
                    <td>{{ $account->currency->val }}</td>
                    <td>
                        <a href="{{ route('cash_report.createForm', $account->id) }}">Créer un Cash Report</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection