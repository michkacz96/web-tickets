@extends('layouts.app')
@section('content')

    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['action' => ['App\Http\Controllers\CustomerController@update', $customer->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('name', __('Name')) !!}
        {!! Form::text('name', $customer->name, $attributes=['class' => 'form-control', 'placeholder' => __('Name')]) !!}
        @error('name')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('full_name', __('Full name')) !!}
        {!! Form::text('full_name', $customer->full_name, $attributes=['class' => 'form-control', 'placeholder' => __('Full name')]) !!}
        @error('full_name')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('address', __('Street')) !!}
        {!! Form::text('address', $customer->address, $attributes=['class' => 'form-control', 'placeholder' => __('Street')]) !!}
        @error('address')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('building_number', __('Building number')) !!}
        {!! Form::text('building_number', $customer->building_number, $attributes=['class' => 'form-control', 'placeholder' => __('Building number')]) !!}
        @error('building_number')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('apartment_number', __('Apartment number')) !!}
        {!! Form::text('apartment_number', $customer->apartment_number, $attributes=['class' => 'form-control', 'placeholder' => __('Apartment number')]) !!}
        @error('apartment_number')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('postal_code', __('Postal code')) !!}
        {!! Form::text('postal_code', $customer->postal_code, $attributes=['class' => 'form-control', 'placeholder' => __('Postal code')]) !!}
        @error('postal_code')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('city', __('City')) !!}
        {!! Form::text('city', $customer->city, $attributes=['class' => 'form-control', 'placeholder' => __('City')]) !!}
        @error('city')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('province', __('Province')) !!}
        {!! Form::text('province', $customer->province, $attributes=['class' => 'form-control', 'placeholder' => __('Province')]) !!}
        @error('province')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('country', __('Country')) !!}
        {!! Form::text('country', $customer->country, $attributes=['class' => 'form-control', 'placeholder' => __('Country')]) !!}
        @error('country')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>   
    <div class="form-group">
        {!! Form::label('tin_ssn', __('TIN')) !!}
        {!! Form::text('tin_ssn', $customer->tin_ssn, $attributes=['class' => 'form-control', 'placeholder' => __('Taxpayer Identification Number')]) !!}
        @error('tin_ssn')
            <strong class="text-danger">{{ $message }}</strong>    
        @enderror
    </div>
    <div class="form-group">
        {{Form::label('type', 'Property')}}
        {{Form::select('type', $customerTypes, $customer->type, ['class' => 'form-select', 'required'])}}
    </div>        
        
        <div class="my-3">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit(__('Save changes'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection