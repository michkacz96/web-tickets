@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    <h5 class="my-3">{{__('Add new customer')}}</h5>
    
    {!! Form::open(['url' => route('customers.store'), 'action' => 'App\Http\Controllers\CustomerController@store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="form-group col-lg-3">
                {{Form::label('type', 'Type')}}
                {{Form::select('type', $customerTypes, null, ['class' => 'form-select', 'required'])}}
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('tin_ssn', __('TIN')) !!}
                {!! Form::text('tin_ssn', null, $attributes=['class' => 'form-control', 'placeholder' => __('Taxpayer Identification Number')]) !!}
                @error('tin_ssn')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-6">
                {!! Form::label('name', __('Name')) !!}
                {!! Form::text('name', null, $attributes=['class' => 'form-control', 'placeholder' => __('Name')]) !!}
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-12">
                {!! Form::label('full_name', __('Full name')) !!}
                {!! Form::text('full_name', null, $attributes=['class' => 'form-control', 'placeholder' => __('Full name')]) !!}
                @error('full_name')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-8">
                {!! Form::label('address', __('Street')) !!}
                {!! Form::text('address', null, $attributes=['class' => 'form-control', 'placeholder' => __('Street')]) !!}
                @error('address')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-2">
                {!! Form::label('building_number', __('Building number')) !!}
                {!! Form::text('building_number', null, $attributes=['class' => 'form-control', 'placeholder' => __('Building number')]) !!}
                @error('building_number')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-2">
                {!! Form::label('apartment_number', __('Apartment number')) !!}
                {!! Form::text('apartment_number', null, $attributes=['class' => 'form-control', 'placeholder' => __('Apartment number')]) !!}
                @error('apartment_number')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('postal_code', __('Postal code')) !!}
                {!! Form::text('postal_code', null, $attributes=['class' => 'form-control', 'placeholder' => __('Postal code')]) !!}
                @error('postal_code')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('city', __('City')) !!}
                {!! Form::text('city', null, $attributes=['class' => 'form-control', 'placeholder' => __('City')]) !!}
                @error('city')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('province', __('Province')) !!}
                {!! Form::text('province', null, $attributes=['class' => 'form-control', 'placeholder' => __('Province')]) !!}
                @error('province')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('country', __('Country')) !!}
                {!! Form::text('country', null, $attributes=['class' => 'form-control', 'placeholder' => __('Country')]) !!}
                @error('country')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>   
        </div>
        
        <div class="my-3 d-flex flex-row justify-content-start align-items-center">
            <h5>{{__('Contact details')}}</h5>
            <button type="" id="add_new_contact" class="btn btn-success ms-3">Add new</button>
        </div>
        
        
        <div class="row">
            <div class="form-group col-lg-3">
                {{Form::label('contact_type', 'Contact type')}}
                {{Form::select('contact_type', $contactTypes, null, ['class' => 'form-select', 'required'])}}
            </div>
            <div class="form-group col-lg-3">
                {!! Form::label('value', __('Value')) !!}
                {!! Form::text('value', null, $attributes=['class' => 'form-control', 'placeholder' => __('Value')]) !!}
                @error('value')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
            <div class="form-group col-lg-6">
                {!! Form::label('tags', __('Tags')) !!}
                {!! Form::text('tags', null, $attributes=['class' => 'form-control', 'placeholder' => __('Tags')]) !!}
                @error('tags')
                    <strong class="text-danger">{{ $message }}</strong>    
                @enderror
            </div>
        </div>

        <div class="my-3">
            {{Form::submit(__('Create new customer'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection