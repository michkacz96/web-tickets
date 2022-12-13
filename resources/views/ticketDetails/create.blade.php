@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['url' => route('ticket-details.store', ['ticket' => $ticket->id]), 'action' => 'App\Http\Controllers\TicketDetailController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('ticket', __('Ticket')) !!}
            {!! Form::hidden('ticket', $ticket->id) !!}
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
                    <tr {{$ticket->getColorTable()}}>
                        <td>{{$ticket->getLocalCreatedAt()}}</td>
                        <td>{{$ticket->title}}</td>
                        <td>{{$ticket->description}}</td>
                        <td>{{$ticket->getNameTicketCategory()}}</td>
                        <td>{{$ticket->getNameCustomer()}}</td>
                        <td>{{__($ticket->getStatusName())}}</td>
                        <td>{{$ticket->getNameCreatedBy()}}</td>
                        <td>{!! $ticket->getNameAssignedTo() !!}</td>
                    </tr>
                  </tbody>
            </table>
        </div>
        <div class="form-group">
            {!! Form::label('message', __('Message')) !!}
            {!! Form::textarea('message', old('message'), $attributes=['class' => 'form-control', 'placeholder' => __('Message')]) !!}
            @error('message')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>
        
        <div class="my-3">
            {{Form::submit(__('Add message'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection