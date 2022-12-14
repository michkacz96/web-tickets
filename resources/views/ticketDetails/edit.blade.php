@extends('layouts.app')
@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['url' => route('ticket-details.update', ['ticket_detail' => $message->id]), 'action' => 'App\Http\Controllers\TicketDetailController@update', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('ticket', __('Ticket')) !!}
            {!! Form::hidden('ticket', $message->id) !!}
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">{{__('Create date')}}</th>
                        <th scope="col">{{__('Title')}}</th>
                        <th scope="col">{{__('Description')}}</th>
                        <th scope="col">{{__('Category')}}</th>
                        <th scope="col">{{__('Customer')}}</th>
                        <th scope="col">{{__('Status')}}</th>
                        <th scope="col">{{__('Created by')}}</th>
                        <th scope="col">{{__('Assigned to')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr {{$message->ticket->getColorTable()}}>
                        <td>{{$message->ticket->getLocalCreatedAt()}}</td>
                        <td>{{$message->ticket->title}}</td>
                        <td>{{$message->ticket->description}}</td>
                        <td>{{$message->ticket->getNameTicketCategory()}}</td>
                        <td>{{$message->ticket->getNameCustomer()}}</td>
                        <td>{{__($message->ticket->getStatusName())}}</td>
                        <td>{{$message->ticket->getNameCreatedBy()}}</td>
                        <td>{!! $message->ticket->getNameAssignedTo() !!}</td>
                    </tr>
                  </tbody>
            </table>
        </div>
        <div class="form-group">
            {!! Form::label('message', __('Message')) !!}
            {!! Form::textarea('message', (old('message')) ? old('message') : $message->message, $attributes=['class' => 'form-control', 'placeholder' => __('Message')]) !!}
            @error('message')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit(__('Save changes'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection