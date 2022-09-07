@extends('layouts.app')
@section('content')
<div class="content__wrapper">
    <div class="title">
        Results
    </div>
    <div class="result__wrapper">
        <div class="profile__block profile__stats results">
            <div class="profile__stats-li restotal">
                {{ $results['overall'] }}/20
            </div>
            <div class="profile__stats-li">
                Art 
                <div class="profile__stats-info">
                    {{ $results['art'] }}/4
                </div>
            </div>
            <div class="profile__stats-li">
                History 
                <div class="profile__stats-info">
                    {{ $results['history'] }}/4
                </div>
            </div>
            <div class="profile__stats-li">
                Geography 
                <div class="profile__stats-info">
                    {{ $results['geography'] }}/4
                </div>
            </div>
            <div class="profile__stats-li">
                Science
                <div class="profile__stats-info">
                    {{ $results['science'] }}/4
                </div>
            </div>
            <div class="profile__stats-li">
                Sports 
                <div class="profile__stats-info">
                    {{ $results['sports'] }}/4
                </div>
        </div>
    </div>
</div>
@endsection('endcontent')
