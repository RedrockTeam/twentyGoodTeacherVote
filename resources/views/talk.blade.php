@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/talk.css')}}"/>
@stop
@section('content')
    <div class="talk">
        <img class="talk_tip" src="{{asset('img/tip.png')}}" alt="new"/>
        <div class="talk_title">
            <h3 class="talk_title_h">{{$data->title}}</h3>
            <p class="talk_title_time">{{$data->created_at}}</p>
        </div>
        <p class="talk_main">
            {{$data->content}}
        </p>
    </div>
@stop