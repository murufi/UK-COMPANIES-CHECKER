@extends('layouts.app')

@section('content')
<h2 class="mb-4">Search UK Companies</h2>

<form method="GET" action="{{ route('companies.search') }}" class="mb-4">
    <div class="row g-2">
        <div class="col-md-4">
            <input type="text" name="q" class="form-control" value="{{ request('q') }}" placeholder="Company name or number">
        </div>

        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">Any Status</option>
                {{-- @foreach ($status as $stat)
                    <option value="{{ $stat }}" {{ request('status') == $stat ? 'selected' : '' }}>
                        {{ ucfirst($stat) }}
                    </option>
                @endforeach --}}
                <option value="active">Active</option>
            </select>
        </div>

        <div class="col-md-2">
            <input type="text" name="location" class="form-control" value="{{ request('location') }}" placeholder="Location">
        </div>

        <div class="col-md-2">
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>

        <div class="col-md-2">
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
    </div>
    <button class="btn btn-primary mt-3">Filter</button>
</form>
@endsection