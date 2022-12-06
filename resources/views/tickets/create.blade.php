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
            {!! Form::textarea('description', old('description'), $attributes=['rows' => '2', 'class' => 'form-control', 'placeholder' => __('Description')]) !!}
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
        <div class="form-group">
            <label for="date">{{__('Due date')}}</label>
            <div class="input-group">
                <div class="input-group-text">
                    <input id="use_date" class="form-check-input mt-0" name="use_date" type="checkbox" aria-label="Checkbox for following text input">
                    <label for="use_date" class="ms-2">{{__('Due date')}}</label>
                </div>
                <input id="date" class="form-control" name="date" type="date" value="{{(old('date') ? old('date') : date('Y-m-d'))}}">
                @error('date')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
                <input id="time" class="form-control" name="time" type="time" value="{{(old('time') ? old('time') : date('H:i'))}}">
                @error('time')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
        </div>
        
        <div class="my-3">
            {{Form::submit(__('Create new ticket'), ['class' => 'btn btn-success float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection