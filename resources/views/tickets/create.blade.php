@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['url' => route('tickets.store'), 'action' => 'App\Http\Controllers\TicketController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('title', __('Title')) !!}
            {!! Form::text('title', old('title'), $attributes=['class' => 'form-control', 'placeholder' => __('Title')]) !!}
            @error('title')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', __('Description')) !!}
            {!! Form::textarea('description', old('description'), $attributes=['class' => 'form-control', 'placeholder' => __('Description')]) !!}
            @error('description')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('customer', __('Customer')) !!}
            {!! Form::select('customer', $customers, old('customer'), $attributes=['class' => 'form-select']) !!}
            @error('customer')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('category', __('Category')) !!}
            {!! Form::select('category', $categories, old('category'), $attributes=['class' => 'form-select']) !!}
            @error('category')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::submit(__('Create new ticket'), ['class' => 'btn btn-success float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection