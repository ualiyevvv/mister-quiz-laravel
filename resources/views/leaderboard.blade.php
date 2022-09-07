@extends('layouts.app')
@section('content')
<div class="content__wrapper">
    <div class="title">
        Leaderboard
    </div>
    <div class="leaderboard__wrapper">
        <div class="leader">
            <div class="leader__row">
                <div class="leader__block counter">
                    #
                </div>
                <div class="leader__block">
                    Username
                </div>
            </div>
            <div class="leader__row leader__stats">
                <div class="leader__block">XP</div>
                <div class="leader__block">Total correct answers</div>
            </div>
        </div>
        <? $counter = 0?>
        @if(count($users) > 0)
            @foreach($users as $user)
                <? $counter++ ?>
                <div class="leader">
                    <div class="leader__row">
                        <div class="leader__block counter">
                            {{ $counter }}
                        </div>
                        <div class="leader__block">
                            @if($user->username == Auth::user()->username)
                                {{ $user->username }} <span class="you">(you)</span>
                            @else
                                {{ $user->username }}
                            @endif
                        </div>
                    </div>
                    <div class="leader__row leader__stats">
                        <div class="leader__block">{{ $user->xp }}</div>
                        <div class="leader__block">{{ $user->getCorrectAnswers() }}</div>
                    </div>
                </div>
            @endforeach
        @else
            users does not exist
        @endif
        
    </div>
</div>
@endsection('endcontent')