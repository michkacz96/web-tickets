@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('tickets.index')}}">{{__('Go to list of tickets')}}</a>
        </li>
    </ul>
    <hr>
    {!! Form::open(['action' => ['App\Http\Controllers\TicketController@showAssignTo', $ticket->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('assign_to', __('Assign ticket')) !!}
            {!! Form::select('assign_to', $users, ($ticket->assigned_to) ? $ticket->assigned_to : old('assign_to'), $attributes=['class' => 'form-select']) !!}
            @error('assign_to')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>        
        <div class="my-3">
            {{Form::hidden('_method', 'PATCH')}}
            {{Form::submit(__('Assign ticket'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
    <span class="clearfix"></span>
    <table class="mt-3 table table-striped table-sm">
        <tr>
            <th scope="col">{{__('Create date')}}</th>
            <td>{{$ticket->getLocalCreatedAt()}}</td>
        </tr>
        <tr>
            <th scope="col">{{__('Title')}}</th>
            <td>{{$ticket->title}}</td>
        </tr>
        <tr>
            <th scope="col">{{__('Description')}}</th>
            <td>{{$ticket->description}}</td>
        </tr>
        <tr>
            <th scope="col">{{__('Category')}}</th>
            <td>{{__($ticket->getNameTicketCategory())}}</td>
        </tr>
        <tr>
            <th scope="col">{{__('Customer')}}</th>
            <td>{{__($ticket->getNameCustomer())}}</td>
        </tr>
        <tr {{$ticket->getColorTable()}}>
            <th scope="col">{{__('Status')}}</th>
            <td>{{__($ticket->getStatusName())}}</td>
        </tr>
        <tr>
            <th scope="col">{{__('Created by')}}</th>
            <td>{{$ticket->getNameCreatedBy()}}</td>
        </tr>
    </table>
@endsection