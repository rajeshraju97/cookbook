@extends('layouts.app')
@section('title', 'Admin Login')
@section('content')



<div class="uk-container uk-padding-large uk-container-small">
    <div class="uk-grid uk-flex-center" uk-grid>
        <div class="uk-width-1-2@s uk-width-1-3@m">
            <h2 class="uk-text-center uk-margin-bottom">Admin Login</h2>
            <form method="POST" action="{{ route('admin.login') }}" class="uk-form-stacked">
                @csrf
                <div class="uk-margin">
                    <label class="uk-form-label" for="email">Email</label>
                    <div class="uk-form-controls">
                        <input type="email" name="email" class="uk-input" id="email" required>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <div class="uk-form-controls">
                        <input type="password" name="password" class="uk-input" id="password" required>
                    </div>
                </div>
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Login</button>
            </form>
        </div>
    </div>
</div>



@endsection