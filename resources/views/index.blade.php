@extends('layouts.app')
@section('content')
<div class="dash">
    <div class="dash__wrapper">
        <div class="dash__row">
            <a href="{{ route('startquiz') }}" class="itema">
                <div class="item" style="background-color: #e21b3c;">
                    <div class="item__caption">{{ $quiz }}Quiz</div>
                </div>
            </a>
            <a href="{{ route('leaderboard') }}" class="itema">
                <div class="item" style="background-color: #1368ce;">
                    <div class="item__caption">Leaderboard</div>
                </div>
            </a>
        </div>
        <div class="dash__row">
            <a href="{{ route('profile') }}" class="itema">
                <div class="item" style="background-color: #d89e00;">
                    <div class="item__caption">Profile</div>
                </div>
            </a>
            @auth
            <a href="#" class="itema" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="item" style="background-color: grey;">
                    <div class="item__caption">Log out</div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </a>
            @endif
        </div>
    </div>
</div>
@endsection('endcontent')