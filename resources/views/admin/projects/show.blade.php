@extends('layouts.admin')

@section('content')

    <h1>{{$project->title}}</h1>
    <img src="{{asset('storage/' . $post->cover_image) }}">