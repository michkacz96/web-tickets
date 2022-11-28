@extends('layouts.app')
@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary btn-block">{{__('BTN_GO_BACK')}}</a>

    <hr class="my-3">
    
    {!! Form::open(['url' => url('/ticket-categories/'), 'action' => 'App\Http\Controllers\TicketCategoryController@update', $ticketCategory->id, 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', __('TEXT_NAME')) !!}
            {!! Form::text('name', $ticketCategory->name, $attributes=['class' => 'form-control', 'placeholder' => __('TEXT_NAME')]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', __('TEXT_DESCRIPTION')) !!}
            {!! Form::text('description', $ticketCategory->description, $attributes=['class' => 'form-control', 'placeholder' => __('TEXT_DESCRIPTION')]) !!}
        </div>
        
        <div class="my-3">
            {{Form::submit(__('BTN_SAVE_CHANGES'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection