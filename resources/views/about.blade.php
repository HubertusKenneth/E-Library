@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="text-center mb-5 fw-bold display-6">
        {{ __('about.title') }}
    </h1>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-3">
                {{ __('about.application.title') }}
            </h5>

            <p class="card-text text-muted">
                {{ __('about.application.p1') }}
            </p>

            <p class="card-text text-muted">
                {{ __('about.application.p2') }}
            </p>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-3">
                {{ __('about.target.title') }}
            </h5>

            <ul class="text-muted mb-0">
                <li>
                    <strong>Students</strong> – {{ __('about.target.students') }}
                </li>
                <li>
                    <strong>Guests</strong> – {{ __('about.target.guests') }}
                </li>
                <li>
                    <strong>Admin</strong> – {{ __('about.target.admin') }}
                </li>
            </ul>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-3">
                {{ __('about.features.title') }}
            </h5>

            <ol class="text-muted mb-0">
                <li>
                    <strong>{{ __('about.features.book_list') }}</strong> – {{ __('about.features.book_list_desc') }}
                </li>
                <li>
                    <strong>{{ __('about.features.book_detail') }}</strong> – {{ __('about.features.book_detail_desc') }}
                </li>
                <li>
                    <strong>{{ __('about.features.favorite') }}</strong> – {{ __('about.features.favorite_desc') }}
                </li>
                <li>
                    <strong>{{ __('about.features.search') }}</strong> – {{ __('about.features.search_desc') }}
                </li>
                <li>
                    <strong>{{ __('about.features.auth') }}</strong> – {{ __('about.features.auth_desc') }}
                </li>
            </ol>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-3">
                {{ __('about.team.title') }}
            </h5>

            <ul class="text-muted mb-0">
                <li>Hubertus Kenneth Alfragisa – 2702214514</li>
                <li>Vyone Louis – 2702212452</li>
                <li>Clarissa Clementia – 2702218393</li>
                <li>Felice Tania – 2702220901</li>
                <li>Fendy Yurista – 2702254493</li>
            </ul>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <img src="{{ asset('storage/developer.jpg') }}"
                         alt="Developer Photo"
                         class="rounded-circle mb-3"
                         style="width:150px; height:150px; object-fit:cover;">

                    <h6 class="fw-semibold mb-1">
                        {{ __('about.footer.title') }}
                    </h6>

                    <p class="text-muted mb-0">
                        {{ __('about.footer.subtitle1') }}<br>
                        {{ __('about.footer.subtitle2') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
