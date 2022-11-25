@extends('layouts.app')

@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary btn-block">{{$texts['BTN_GO_BACK']}}</a>

    <hr class="my-3">
    
    {!! Form::open(['url' => url($language.'/ticket-categories/'), 'action' => 'App\Http\Controllers\TicketCategoryController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', $texts['TABLE_COL_NAME']) !!}
            {!! Form::text('name', null, $attributes=['class' => 'form-control', 'placeholder' => $texts['TABLE_COL_NAME']]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', $texts['TABLE_COL_DESCRIPTION']) !!}
            {!! Form::text('description', null, $attributes=['class' => 'form-control', 'placeholder' => $texts['TABLE_COL_DESCRIPTION']]) !!}
        </div>
        
        <div class="my-3">
            {{Form::submit($texts['BTN_CREATE_CATEGORY'], ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection