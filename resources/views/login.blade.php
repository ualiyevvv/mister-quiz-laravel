@extends('layouts.app')
@section('content')
<div class="content__wrapper">
    <div class="title">
        Log in
    </div>
    <div class="login__wrapper">
        <div class="login__form">
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <input class="input" type="text" name="email" placeholder="email" required value="{{ old('email') }}">
                <input class="input" type="password" name="password" placeholder="password" required>
                <input class="btn" type="submit" value="Log in">   
            </form>
            <p>or</p>
            <p><a href="{{ route('register') }}">Sign up</a></p>
        </div>
    </div>
</div>
@endsection('endcontent')
