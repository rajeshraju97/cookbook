@extends('layouts.app')
@section('title', 'sign in')
@section('content')
@include('layouts.nav')


@if ($errors->any())
    <div class="uk-alert-danger" uk-alert>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<div class="uk-grid-collapse" data-uk-grid>
    <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center" data-uk-height-viewport>
        <div class="uk-width-3-4@s">
            <div class="uk-text-center uk-margin-bottom">
                <a class="uk-logo uk-text-primary uk-text-bold" href="{{url('/')}}">CookBook</a>
            </div>
            <div class="uk-text-center uk-margin-medium-bottom">
                <h1 class="uk-h2 uk-letter-spacing-small">Login to CookBook</h1>
            </div>
            <form class="uk-text-center uk-form-stacked" action="{{route('user.login')}}" method="POST">
                @csrf
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="email">Email</label>
                    <input id="email" name="email" class="uk-input uk-form-large uk-border-pill uk-text-center"
                        type="email" placeholder="email@company.com">
                </div>
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <input id="password" name="password" class="uk-input uk-form-large uk-border-pill uk-text-center"
                        type="password" placeholder="***********">
                </div>
                <div class="uk-width-1-1 uk-margin uk-text-center">
                    <a class="uk-text-small uk-link-muted" href="#">Forgot your password?</a>
                </div>
                <div class="uk-width-1-1 uk-text-center">
                    <button class="uk-button uk-button-primary uk-button-large">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center uk-light" data-uk-height-viewport>
        <div class="uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-background-overlay 
      uk-border-rounded-large uk-width-1-1 uk-height-xlarge uk-flex uk-flex-middle uk-flex-center"
            style="background-image: url(https://via.placeholder.com/600x700);">
            <div class="uk-padding-large">
                <div class="uk-text-center">
                    <h2 class="uk-letter-spacing-small">Hello There, Join Us</h2>
                </div>
                <div class="uk-margin-top uk-margin-medium-bottom uk-text-center">
                    <p>Enter your personal details and join the cooking community</p>
                </div>
                <div class="uk-width-1-1 uk-text-center">
                    <a href="{{route('user.register')}}"
                        class="uk-button uk-button-primary uk-button-large">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection