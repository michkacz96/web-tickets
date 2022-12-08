@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('customers.index')}}">{{__('Go to list of customers')}}</a>
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
              <th scope="col">{{__('Delete date')}}</th>
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
                    <td>{{$customer->deleted_at}}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-end">
                            {!! Form::open(['action' => ['App\Http\Controllers\CustomerController@restore', $customer->id], 'method' => 'POST', 'class' => 'mx-1']) !!}
                                {{Form::submit(__('Restore'), ['class' => 'btn btn-sm btn-secondary'])}}
                            {!! Form::close() !!}
                            {!! Form::open(['action' => ['App\Http\Controllers\CustomerController@forceDelete', $customer->id], 'method' => 'POST', 'class' => 'mx-1']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit(__('Delete forever'), ['class' => 'btn btn-sm btn-danger'])}}
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