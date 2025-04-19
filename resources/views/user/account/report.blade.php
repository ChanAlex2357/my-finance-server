<!-- filepath: d:\JACQUES Chan Alex\Finance-app\my-finance-server\resources\views\cash_report\create.blade.php -->
@extends('layouts.user')

@section('content')
    <h1>Créer un Cash Report pour le compte : {{ $account->name }}</h1>
    <form action="{{ route('cash_report.create', $account->id) }}" method="POST">
        @csrf
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="report_date">Date du rapport</label>
            <input type="datetime-local" id="report_date" name="report_date" required>
        </div>
        <div>
            <label for="report_amout">Montant du rapport</label>
            <input type="number" id="report_amout" name="report_amout" step="0.01" required>
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection