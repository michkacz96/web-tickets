@extends('layouts.app')

@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary btn-block">{{__('BTN_GO_BACK')}}</a>

    <hr class="my-3">
    
    {!! Form::open(['url' => url('/ticket-categories/'), 'action' => 'App\Http\Controllers\TicketCategoryController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', __('TEXT_NAME')) !!}
            {!! Form::text('name', null, $attributes=['class' => 'form-control', 'placeholder' => __('TEXT_NAME')]) !!}
            @error('name')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', __('TEXT_DESCRIPTION')) !!}
            {!! Form::text('description', null, $attributes=['class' => 'form-control', 'placeholder' => __('TEXT_DESCRIPTION')]) !!}
            @error('description')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::submit(__('BTN_CREATE_CATEGORY'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection