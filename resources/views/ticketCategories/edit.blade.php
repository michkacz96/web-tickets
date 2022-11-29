@extends('layouts.app')
@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary btn-block">{{__('Go back')}}</a>

    <hr class="my-3">
    
    {!! Form::open(['action' => ['App\Http\Controllers\TicketCategoryController@update', $ticketCategory->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', $ticketCategory->name, $attributes=['class' => 'form-control', 'placeholder' => __('Name')]) !!}
            @error('name')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', __('Description')) !!}
            {!! Form::text('description', $ticketCategory->description, $attributes=['class' => 'form-control', 'placeholder' => __('Description')]) !!}
            @error('description')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit(__('Save changes'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection