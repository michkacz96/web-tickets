@extends('layouts.app')

@section('content')
    @if(count((is_countable($ticketCategories)?$ticketCategories:[])))

    @else
        <p class="text-center">{{$NO_DATA_MSG}}</p>
    @endif
@endsection