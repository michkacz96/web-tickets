@extends('layouts.app')
@section('content')

    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['action' => ['App\Http\Controllers\CustomerContactController@update', $contact->id], 'method' => 'POST']) !!}
        <div class="row">
            <div class="form-group col-lg-12">
                {{Form::label('customer', __('Customer'))}}
                {{Form::select('customer', $customers, $contact->customer_id, ['class' => 'form-select', 'required'])}}
            </div>
            <div class="form-group col-lg-3">
                {{Form::label('type', __('Type'))}}
                {{Form::select('type', $contactTypes, $contact->type, ['class' => 'form-select', 'required'])}}
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('value', __('Value')) !!}
                {!! Form::text('value', $contact->value, $attributes=['class' => 'form-control', 'placeholder' => __('Value')]) !!}
                @error('value')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
        </div>
        
        <div class="my-3">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit(__('Save changes'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection