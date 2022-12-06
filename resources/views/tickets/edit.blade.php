@extends('layouts.app')
@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['action' => ['App\Http\Controllers\TicketController@update', $ticket->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('title', __('Title')) !!}
            {!! Form::text('title', $ticket->title, $attributes=['class' => 'form-control', 'placeholder' => __('Title')]) !!}
            @error('title')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', __('Description')) !!}
            {!! Form::textarea('description', $ticket->description, $attributes=['rows' => '2', 'class' => 'form-control', 'placeholder' => __('Description')]) !!}
            @error('description')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('customer', __('Customer')) !!}
            {!! Form::select('customer', $customers, $ticket->customer_id, $attributes=['class' => 'form-select']) !!}
            @error('customer')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('category', __('Category')) !!}
            {!! Form::select('category', $categories, $ticket->ticket_category_id, $attributes=['class' => 'form-select']) !!}
            @error('category')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit(__('Save changes'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection