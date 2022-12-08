@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('customers.create')}}">{{__('Create new customer')}}</a>
        </li>
    </ul>
    <hr>
    
    @if(count((is_countable($customers)?$customers:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">{{__('Name')}}</th>
                  <th scope="col">{{__('Address')}}</th>
                  <th scope="col">{{__('TIN')}}</th>
                  <th scope="col">{{__('Type')}}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->getFullAddress()}}</td>
                        <td>{{$customer->tin_ssn}}</td>
                        <td>{{__($customer->getCustomerType())}}</td>
                        <td>
                            <div class="d-flex flex-row justify-content-end">
                                <a href={{url('/customers/'.$customer->id)}} class="btn btn-sm btn-secondary mx-1">{{__('Details')}}</a>
                                <a href={{url('/customers/'.$customer->id.'/edit')}} class="btn btn-sm btn-secondary mx-1">{{__('Edit')}}</a>
                                {!! Form::open(['action' => ['App\Http\Controllers\CustomerController@destroy', $customer->id], 'method' => 'POST', 'class' => 'mx-1']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger'])}}
                                {!! Form::close() !!}
                            </div>
                           
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