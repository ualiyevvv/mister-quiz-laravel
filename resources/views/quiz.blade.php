@extends('layouts.app')
@section('content')
<div class="content__wrapper">
    <div class="title">
        Quiz {{ $quiz->created_at }}
    </div>
    <div class="quiz__wrapper">
        <form action="{{ route('endquiz') }}" method="post">
            @csrf
            <input type="hidden" name="quiz" value="{{ $quiz->id }}">
            @foreach($questions as $quest)
            <div class="quest">
                <div class="quest__status nonechecked"></div> 
                <!-- checked -->
                <div class="quest__category">
                    {{ $quest->category }}
                </div>
                <div class="quest__text">
                    {{ $quest->question }}
                    <span class="quest__xp">
                        {{ $quest->xp }}xp
                    </span>
                </div>
                <div class="quest__answers">
                    <? /*$answers = $quest->answers(); dd($answers) */?>
                    @foreach($quest->answers as $ans)
                        <div class="answ">
                            <input type="radio" id="{{ $ans->id }}" name="{{ $quest->id }}" value="{{ $ans->id }}" required>
                            <label for="{{ $ans->id }}">{{ $ans->answer }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <input class="quiz__btn" type="submit" onclick="if(confirm('Are you sure to submit the quiz?')){return true}else{return false}" value="Submit">
        </form>
    </div>
</div>
@endsection('endcontent')