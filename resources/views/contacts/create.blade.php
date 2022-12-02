@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    <h5 class="my-3">{{__('Add contact information')}}</h5>
    
    {!! Form::open(['url' => route('contacts.store'), 'action' => 'App\Http\Controllers\CustomerContactController@store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="form-group col-lg-12">
                {{Form::label('customer', __('Customer'))}}
                {{Form::select('customer', $customers, old('customer'), ['class' => 'form-select', 'required'])}}
            </div>
            <div class="form-group col-lg-3">
                {{Form::label('type', __('Type'))}}
                {{Form::select('type', $contactTypes, old('type'), ['class' => 'form-select', 'required'])}}
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('value', __('Value')) !!}
                {!! Form::text('value', old('value'), $attributes=['class' => 'form-control', 'placeholder' => __('Value')]) !!}
                @error('value')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>

            <div class="form-group col-lg-6">
                {!! Form::label('tags', __('Tags')) !!}
                {!! Form::text('tags', old('tags'), $attributes=['class' => 'form-control', 'placeholder' => __('Tags')]) !!}
                @error('tags')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
        </div>

        <div class="my-3">
            {{Form::submit(__('Add new contact'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection