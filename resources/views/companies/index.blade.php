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

{{-- <a href="{{ route('companies.export.excel') }}" class="btn btn-outline-success mb-3">Export All Companies (Excel)</a> --}}

@forelse ($results['items'] as $company)
    <div class="card mb-3">
        <div class="card-body">
            Company Name: <h5>{{ $company['title'] ?? '' }}</h5>
           Company Number: <h5>{{ $company['company_number'] ?? '' }}</h5>
            Company Type: <h5>{{ $company['company_type']?? '' }}</h5>
            <p>Status: <strong>{{ $company['company_status'] ?? ''}}</strong> | Incorporated: {{ $company['date_of_creation'] ?? ''}}</p>
            <p><h5>Company Address: </h5></p>
            <p>Address 1:<strong>{{ $company['address']['address_line_1']?? '' }}</strong> |Address 2: <strong>{{ $company['address']['address_line_2']?? '' }} </strong>|  Location: <strong>{{ $company['address']['locality']?? '' }} </strong> |  Country: <strong>{{ $company['address']['country']?? '' }} </strong> </p>
            <a href="{{ route('companies.show', $company['company_number']) }}" class="btn btn-sm btn-outline-primary">View Details</a>
        </div>
        {{ $count }}
    </div>
@empty
    <p>No results found.</p>
@endforelse

{{-- {{ $companies->appends(request()->query())->links() }} --}}
@endsection
