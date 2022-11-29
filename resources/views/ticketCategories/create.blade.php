@extends('layouts.app')

@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary btn-block">{{__('Go back')}}</a>

    <hr class="my-3">
    
    {!! Form::open(['url' => route('ticket-categories.store'), 'action' => 'App\Http\Controllers\TicketCategoryController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, $attributes=['class' => 'form-control', 'placeholder' => __('Description')]) !!}
            @error('name')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', __('Description')) !!}
            {!! Form::text('description', null, $attributes=['class' => 'form-control', 'placeholder' => __('Description')]) !!}
            @error('description')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::submit(__('Create new ticket category'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection