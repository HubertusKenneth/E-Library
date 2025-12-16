@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="bg-white rounded-4 shadow-sm px-4 px-md-5 py-5">


    {{-- HERO --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5 mb-3">
            {{ __('about.title') }}
        </h1>
        <p class="text-muted fs-5">
            A simple digital library to explore, manage, and enjoy books 📚
        </p>
    </div>

    <hr class="mb-5">

    {{-- ABOUT APPLICATION --}}
    <section class="mb-5">
        <div class="d-flex align-items-center mb-3">
            <i class="bi bi-book fs-3 text-success me-3"></i>
            <h4 class="fw-semibold mb-0">
                {{ __('about.application.title') }}
            </h4>
        </div>

        <p class="text-muted">
            {{ __('about.application.p1') }}
        </p>
        <p class="text-muted mb-0">
            {{ __('about.application.p2') }}
        </p>
    </section>

    <hr class="mb-5">

    {{-- TARGET USERS --}}
    <section class="mb-5">
        <div class="d-flex align-items-center mb-3">
            <i class="bi bi-people fs-3 text-primary me-3"></i>
            <h4 class="fw-semibold mb-0">
                {{ __('about.target.title') }}
            </h4>
        </div>

        <ul class="list-unstyled text-muted">
            <li class="mb-2">
                <i class="bi bi-mortarboard me-2"></i>
                <strong>Students</strong> – {{ __('about.target.students') }}
            </li>
            <li class="mb-2">
                <i class="bi bi-person me-2"></i>
                <strong>Guests</strong> – {{ __('about.target.guests') }}
            </li>
            <li>
                <i class="bi bi-shield-lock me-2"></i>
                <strong>Admin</strong> – {{ __('about.target.admin') }}
            </li>
        </ul>
    </section>

    <hr class="mb-5">

    {{-- FEATURES --}}
    <section class="mb-5">
        <div class="d-flex align-items-center mb-3">
            <i class="bi bi-stars fs-3 text-warning me-3"></i>
            <h4 class="fw-semibold mb-0">
                {{ __('about.features.title') }}
            </h4>
        </div>

        <ol class="text-muted">
            <li><strong>{{ __('about.features.book_list') }}</strong> – {{ __('about.features.book_list_desc') }}</li>
            <li><strong>{{ __('about.features.book_detail') }}</strong> – {{ __('about.features.book_detail_desc') }}</li>
            <li><strong>{{ __('about.features.favorite') }}</strong> – {{ __('about.features.favorite_desc') }}</li>
            <li><strong>{{ __('about.features.search') }}</strong> – {{ __('about.features.search_desc') }}</li>
            <li><strong>{{ __('about.features.auth') }}</strong> – {{ __('about.features.auth_desc') }}</li>
        </ol>
    </section>

    <hr class="mb-5">

    {{-- TEAM --}}
    <section class="mb-5">
        <div class="d-flex align-items-center mb-3">
            <i class="bi bi-code-slash fs-3 me-3"></i>
            <h4 class="fw-semibold mb-0">
                {{ __('about.team.title') }}
            </h4>
        </div>

        <ul class="text-muted mb-0">
            <li>Hubertus Kenneth Alfragisa – 2702214514</li>
            <li>Vyone Louis – 2702212452</li>
            <li>Clarissa Clementia – 2702218393</li>
            <li>Felice Tania – 2702220901</li>
            <li>Fendy Yurista – 2702254493</li>
        </ul>
    </section>

    <hr class="mb-5">

    {{-- DEVELOPER --}}
    <section class="text-center">
        <img src="{{ asset('storage/developer.jpg') }}"
             alt="Developer Photo"
             class="rounded-circle mb-3 shadow-sm"
             style="width:150px; height:150px; object-fit:cover;">

        <h5 class="fw-bold mb-1">
            {{ __('about.footer.title') }}
        </h5>

        <p class="text-muted mb-0">
            {{ __('about.footer.subtitle1') }}<br>
            {{ __('about.footer.subtitle2') }}
        </p>
    </section>
    </div>
</div>
@endsection
