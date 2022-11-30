@extends('layouts.app')

@section('content')
    <a href="{{url()->previous()}}" class="btn btn-primary btn-block">{{__('Go back')}}</a>

    <hr class="my-3">
    
    {!! Form::open(['url' => route('customers.store'), 'action' => 'App\Http\Controllers\CustomerController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, $attributes=['class' => 'form-control', 'placeholder' => __('Name')]) !!}
            @error('name')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('full_name', __('Full name')) !!}
            {!! Form::text('full_name', null, $attributes=['class' => 'form-control', 'placeholder' => __('Full name')]) !!}
            @error('full_name')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('address', __('Street')) !!}
            {!! Form::text('address', null, $attributes=['class' => 'form-control', 'placeholder' => __('Street')]) !!}
            @error('address')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('building_number', __('Building number')) !!}
            {!! Form::text('building_number', null, $attributes=['class' => 'form-control', 'placeholder' => __('Building number')]) !!}
            @error('building_number')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('apartment_number', __('Apartment number')) !!}
            {!! Form::text('apartment_number', null, $attributes=['class' => 'form-control', 'placeholder' => __('Apartment number')]) !!}
            @error('apartment_number')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('postal_code', __('Postal code')) !!}
            {!! Form::text('postal_code', null, $attributes=['class' => 'form-control', 'placeholder' => __('Postal code')]) !!}
            @error('postal_code')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('city', __('City')) !!}
            {!! Form::text('city', null, $attributes=['class' => 'form-control', 'placeholder' => __('City')]) !!}
            @error('city')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('province', __('Province')) !!}
            {!! Form::text('province', null, $attributes=['class' => 'form-control', 'placeholder' => __('Province')]) !!}
            @error('province')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('country', __('Country')) !!}
            {!! Form::text('country', null, $attributes=['class' => 'form-control', 'placeholder' => __('Country')]) !!}
            @error('country')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>   
        <div class="form-group">
            {!! Form::label('tin_ssn', __('TIN')) !!}
            {!! Form::text('tin_ssn', null, $attributes=['class' => 'form-control', 'placeholder' => __('Taxpayer Identification Number')]) !!}
            @error('tin_ssn')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        <div class="form-group">
            {{Form::label('type', 'Property')}}
            {{Form::select('type', $customerTypes, null, ['class' => 'form-select', 'required'])}}
        </div>        
        
        <div class="my-3">
            {{Form::submit(__('Create new customer'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection