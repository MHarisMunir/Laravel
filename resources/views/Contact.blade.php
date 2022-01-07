@extends('layouts.app')

@section('content')

<h1>Contact Page</h1>

    @if(count($people))
        <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        
        @endforeach
        </ul>
    
    @endif



@stop


@section('footer')
    <!-- <Script>alert('Hello Visitor')</Script> -->
    <h2>I'm footer</h2>
@stop