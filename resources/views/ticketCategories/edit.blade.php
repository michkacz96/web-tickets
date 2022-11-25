@extends('layouts.app')

@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary btn-block">{{$texts['BTN_GO_BACK']}}</a>

    <hr class="my-3">
    
    {!! Form::open(['url' => url($language.'/ticket-categories/'), 'action' => 'App\Http\Controllers\TicketCategoryController@update', $ticketCategory->id, 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', $texts['TEXT_NAME']) !!}
            {!! Form::text('name', $ticketCategory->name, $attributes=['class' => 'form-control', 'placeholder' => $texts['TEXT_NAME']]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', $texts['TEXT_DESCRIPTION']) !!}
            {!! Form::text('description', $ticketCategory->description, $attributes=['class' => 'form-control', 'placeholder' => $texts['TEXT_DESCRIPTION']]) !!}
        </div>
        
        <div class="my-3">
            {{Form::submit($texts['BTN_SAVE_CHANGES'], ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection