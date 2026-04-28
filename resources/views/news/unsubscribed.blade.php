@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="premium-card bg-white p-5 rounded shadow-sm border-0">
                <div class="mb-4">
                    <div class="bg-light d-inline-block p-4 rounded-circle mb-3">
                        <i class="fa fa-envelope-open-text text-danger fa-3x"></i>
                    </div>
                </div>
                <h2 class="font-weight-bold mb-3">Unsubscribed Successfully</h2>
                <p class="text-muted lead mb-4">
                    The email address <strong>{{ $email }}</strong> has been removed from our newsletter mailing list.
                </p>
                <p class="mb-4">
                    We're sorry to see you go! If this was a mistake, you can always subscribe again from our website.
                </p>
                <div class="mt-5">
                    <a href="{{ url('/') }}" class="btn btn-primary px-5 py-3 rounded-pill font-weight-bold shadow-sm">
                        Return to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .premium-card {
        transition: transform 0.3s ease;
    }
    .premium-card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection
