@extends('layouts.app')

@section('content')

<h1>Welcome to the Content!  {{$id}} {{$name}} </h1>  
<!--  -->
<!-- <form method="post" action="\App\Http\Controllers\PostsController@content">
    <div>
    <label for="Title">Title : </label>
    <input Name="Title" type="Title" class="title">
    </div>
    <div>
    <label for="Body">Body : </label>
    <input name="body" type="Body" class="text">
    </div>
    <div>
    <input type="button" value="Submit">
    </div>
</form> -->
@stop