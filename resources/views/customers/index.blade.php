@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-start">
        <a href="{{route('customers.create')}}" class="btn btn-primary btn-block">{{__('Create new customer')}}</a>
    </div>
    
    <hr class="my-3">
    @if(count((is_countable($customers)?$customers:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">{{__('Name')}}</th>
                  <th scope="col">{{__('Full name')}}</th>
                  <th scope="col">{{__('Address')}}</th>
                  <th scope="col">{{__('Postal code')}}</th>
                  <th scope="col">{{__('City')}}</th>
                  <th scope="col">{{__('Province')}}</th>
                  <th scope="col">{{__('Country')}}</th>
                  <th scope="col">{{__('TIN')}}</th>
                  <th scope="col">{{__('Type')}}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->full_name}}</td>
                        <td>{{$customer->getAddress()}}</td>
                        <td>{{$customer->postal_code}}</td>
                        <td>{{$customer->city}}</td>
                        <td>{{$customer->province}}</td>
                        <td>{{$customer->country}}</td>
                        <td>{{$customer->tin_ssn}}</td>
                        <td>{{$customer->type}}</td>
                        <td class="d-flex flex-row justify-content-evenly">
                            <a href={{url('/customers/'.$customer->id.'/edit')}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{__('Edit')}}</a>
                            {!! Form::open(['action' => ['App\Http\Controllers\CustomerController@destroy', $customer->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger btn-block'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        
        {{$customers->links()}}

    @else
        <p class="text-center">{{__('No data to display')}}</p>
    @endif
@endsection