@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-secondary" href="{{url('/customers/'.$customer->id.'/edit')}}">{{__('Edit')}}</a>
        </li>
    </ul>
    <hr>
    <h4>{{$customer->name}}</h4>

    <div class="row">
        <div class="col-lg-4">
            <table class="table ">
                <tr>
                    <th scope="row">{{__('Name')}}</th>
                    <td>{{$customer->name}}</td>
                </tr>
                <tr>
                    <th scope="row">{{__('Full name')}}</th>
                    <td>{{$customer->full_name}}</td>
                </tr>
                <tr>
                    <th scope="row">{{__('TIN')}}</th>
                    <td>{{$customer->tin_ssn}}</td>
                </tr>
                <tr>
                    <th scope="row" rowspan="2">{{__('Address')}}</th>
                    <td rowspan="2">{{$customer->getAddress()}}<br>{{$customer->getAddress2()}}</td>
                </tr>
            </table>
            
            @if(count((is_countable($phoneNumbers)?$phoneNumbers:[])))
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('Phone number')}}</th>
                            <th scope="col">{{__('Tags')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($phoneNumbers as $phoneNumber)
                        <tr>
                            <td><a href="tel:{{$phoneNumber->value}}">{{$phoneNumber->value}}</a></td>
                            <td>{{$phoneNumber->tags}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            @if(count((is_countable($emails)?$emails:[])))
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('Email address')}}</th>
                            <th scope="col">{{__('Tags')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($emails as $email)
                        <tr>
                            <td><a href="mailto:{{$email->value}}">{{$email->value}}</a></td>
                            <td>{{$email->tags}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="col-lg-8">

        </div>
    </div>
    
@endsection