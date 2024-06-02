@extends('layout')

@section('content')
    

@if (count($listings) === 0)
     <p>No Data Founded!</p>
@endif


@foreach ($listings as $listing)
    <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
@endforeach


@endsection


