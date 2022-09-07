@extends('layouts.app')
@section('content')
<div class="content__wrapper">
    <div class="title">
        Sign up
    </div>
    <div class="login__wrapper">
        <div class="login__form">
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <input class="input" type="text" name="username" placeholder="username" required value="{{ old('username') }}">
                <input class="input" type="email" name="email" placeholder="email" required value="{{ old('email') }}">
                <input class="input" type="password" name="password" placeholder="password" required>
                <input class="input" type="password" name="password_confirmation" placeholder="retype password" required>
                <input class="btn" type="submit" value="Sign up">   
            </form>
            <p>or</p>
            <p><a href="{{ route('login') }}">Log in</a></p>
        </div>
    </div>
</div>
@endsection('endcontent')