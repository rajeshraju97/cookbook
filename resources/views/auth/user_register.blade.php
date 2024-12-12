@extends('layouts.app')
@section('title', 'sign up')
@section('content')
@include('layouts.nav')

<!-- Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="uk-grid-collapse" data-uk-grid>
    <div class="uk-width-1-2@m uk-padding uk-flex uk-flex-middle uk-flex-center" data-uk-height-viewport>
        <div class="uk-width-3-4@s">
            <div class="uk-text-center uk-margin-bottom">
                <a class="uk-logo uk-text-primary uk-text-bold" href="{{url('/')}}">CookBook</a>
            </div>
            <div class="uk-text-center uk-margin-medium-bottom">
                <h1 class="uk-h2 uk-letter-spacing-small">Create an Account</h1>
            </div>


            <form class="uk-form-stacked" action="{{ route('user.register') }}" method="POST">
                @csrf

                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="name">Full Name</label>
                    <input id="name" name="name" class="uk-input uk-form-large uk-border-pill" type="text"
                        placeholder="Tom Atkins" required value="{{old('name')}}">

                </div>

                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="username">Username</label>
                    <input id="username" name="username" class="uk-input uk-form-large uk-border-pill" type="text"
                        placeholder="tomatkins" required value="{{old('username')}}">
                </div>

                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="email">Email</label>
                    <input id="email" name="email" class="uk-input uk-form-large uk-border-pill" type="email"
                        placeholder="tom@company.com" required value="{{old('email')}}">
                </div>

                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="mobile">Mobile</label>
                    <input id="mobile" name="mobile" class="uk-input uk-form-large uk-border-pill" type="text"
                        placeholder="1234567890" required value="{{old('mobile')}}">
                </div>

                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <input id="password" name="password" class="uk-input uk-form-large uk-border-pill" type="password"
                        placeholder="Min 8 characters" required>
                </div>

                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation"
                        class="uk-input uk-form-large uk-border-pill" type="password"
                        placeholder="Re-enter your password" required>
                </div>

                <div class="uk-width-1-1 uk-text-center">
                    <button type="submit" class="uk-button uk-button-primary uk-button-large uk-border-pill">Sign
                        Up</button>
                </div>

                <div class="uk-width-1-1 uk-margin uk-text-center">
                    <p class="uk-text-small uk-margin-remove">By signing up, you agree to our <a class="uk-link-border"
                            href="#">Terms</a> and <a class="uk-link-border" href="#">Privacy Policy</a>.</p>
                </div>
            </form>

        </div>
    </div>
    <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center uk-light" data-uk-height-viewport>
        <div class="uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-background-overlay 
      uk-border-rounded-large uk-width-1-1 uk-height-xlarge uk-flex uk-flex-middle uk-flex-center"
            style="background-image: url({{asset('images/Login.gif')}});">
            <div class="uk-padding-large">
                <div class="uk-text-center">
                    <h2 class="uk-letter-spacing-small">Welcome Back</h2>
                </div>
                <div class="uk-margin-top uk-margin-medium-bottom uk-text-center">
                    <p>Already signed up, enter your details and start cooking your first meal today</p>
                </div>
                <div class="uk-width-1-1 uk-text-center">
                    <a href="{{route('user.login')}}" class="uk-button uk-button-primary uk-button-large">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection