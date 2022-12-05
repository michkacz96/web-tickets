@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['url' => route('ticket-categories.store'), 'action' => 'App\Http\Controllers\TicketCategoryController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', old('name'), $attributes=['class' => 'form-control', 'placeholder' => __('Name')]) !!}
            @error('name')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', __('Description')) !!}
            {!! Form::text('description', old('description'), $attributes=['class' => 'form-control', 'placeholder' => __('Description')]) !!}
            @error('description')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::submit(__('Create new ticket category'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection