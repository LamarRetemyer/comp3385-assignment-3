@extends('layouts.app')

@section('content')
    <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>

    <div class="mt-4">
        <h2 class="h4">Your Clients</h2>
        @if($clients->isEmpty())
            <p>You don't have any clients yet.</p>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($clients as $client)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $client->name }}</h5>
                                <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
                                <p class="card-text"><strong>Telephone:</strong> {{ $client->telephone ?? 'N/A' }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ $client->address ?? 'N/A' }}</p>
                            </div>
                            @if($client->company_logo)
                                <img src="{{ asset($client->company_logo) }}" class="card-img-bottom" alt="Company Logo">
                            @else
                                <div class="card-footer">
                                    <small class="text-muted">No company logo uploaded</small>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Add New Client</a>
    </div>
@endsection
