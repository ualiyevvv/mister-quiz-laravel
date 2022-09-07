@extends('layouts.app')
@section('content')
<div class="content__wrapper">
    <div class="title">
        Profile
    </div>
    <div class="profile__wrapper">
        <div class="profile__row">
            <div class="profile__block">
                <div class="d16">XP</div>
                <div class="profile__xp">{{ $user->xp }} / {{ $user->rank()[1] }}</div>
                <div class="profile__info">
                    <div class="profile__username">{{ $user->username }} <span> {{ $user->rank()[0] }}</span></div>
                    <div class="profile__email">{{ $user->email }}</div>
                </div>
            </div>
        </div>
        <div class="profile__block profile__stats">
            <div class="profile__stats-li">
                Category 
                <div class="profile__stats-info">
                    <span>Correct answers</span><span>All answers</span><span>Total</span>
                </div>
            </div>
            <div class="profile__stats-li">
                Art 
                <div class="profile__stats-info">
                    <span>{{ $user->stats($user->art)[0][0] }}</span><span>{{ $user->stats($user->art)[0][1] }}</span><span>{{ $user->stats($user->art)[1] }}%</span>
                </div>
            </div>
            <div class="profile__stats-li">
                History 
                <div class="profile__stats-info">
                    <span>{{ $user->stats($user->history)[0][0] }}</span><span>{{ $user->stats($user->history)[0][1] }}</span><span>{{ $user->stats($user->history)[1] }}%</span>
                </div>
            </div>
            <div class="profile__stats-li">
                Geography 
                <div class="profile__stats-info">
                    <span>{{ $user->stats($user->geography)[0][0] }}</span><span>{{ $user->stats($user->geography)[0][1] }}</span><span>{{ $user->stats($user->geography)[1] }}%</span>
                </div>
            </div>
            <div class="profile__stats-li">
                Science
                <div class="profile__stats-info">
                    <span>{{ $user->stats($user->science)[0][0] }}</span><span>{{ $user->stats($user->science)[0][1] }}</span><span>{{ $user->stats($user->science)[1] }}%</span>
                </div>
            </div>
            <div class="profile__stats-li">
                Sports 
                <div class="profile__stats-info">
                    <span>{{ $user->stats($user->sports)[0][0] }}</span><span>{{ $user->stats($user->sports)[0][1] }}</span><span>{{ $user->stats($user->sports)[1] }}%</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('endcontent')
