@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $company->name }}</h2>
    <p><strong>Status:</strong> {{ $company->status }}</p>
    <p><strong>Address:</strong> {{ $company->address }}</p>

    <hr>
    <h4>Filing History</h4>
    <ul class="list-group">
        @forelse ($filings as $filing)
            <li class="list-group-item">
                {{ $filing['description'] ?? 'No description' }} <br>
                <small>{{ $filing['date'] ?? 'No date' }}</small>
            </li>
        @empty
            <li class="list-group-item">No filings found.</li>
        @endforelse
    </ul>
</div>
@endsection
