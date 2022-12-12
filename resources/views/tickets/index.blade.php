@extends('layouts.app-wide')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('tickets.create')}}">{{__('Create new ticket')}}</a>
        </li>
    </ul>
    <hr>

    @if(count((is_countable($tickets)?$tickets:[])))
        <table class="table table-hover text-center">
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
                    <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tickets as $ticket)
                    <tr {{$ticket->getColorTable()}}>
                        <td>{{$ticket->getLocalCreatedAt()}}</td>
                        <td>{{$ticket->title}}</td>
                        <td>{{$ticket->description}}</td>
                        <td>{{$ticket->getNameTicketCategory()}}</td>
                        <td>{{$ticket->getNameCustomer()}}</td>
                        <td>{{__($ticket->getStatusName())}}</td>
                        <td>{{$ticket->getNameCreatedBy()}}</td>
                        <td>
                            {!! $ticket->getNameAssignedTo() !!}
                            @if($ticket->isOwner() && $ticket->status == 'N')
                                <a href={{route('tickets.assign', ['ticket'=> $ticket->id])}} class="d-block btn-link">{{__('Assign ticket')}}</a>
                            @elseif($ticket->isOwner() && $ticket->status != 'C')
                                <a href={{route('tickets.assign', ['ticket'=> $ticket->id])}} class="d-block btn-link mb-1">{{__('Edit assigment')}}</a>
                            @endif
                            @if($ticket->isAssignedToUser() && $ticket->status == 'A')
                                <div>
                                    {!! Form::open(['action' => ['App\Http\Controllers\TicketController@accept', $ticket->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
                                        {{Form::hidden('_method', 'PATCH')}}
                                        {{Form::submit(__('Accept'), ['class' => 'btn btn-sm btn-success'])}}
                                    {!! Form::close() !!}

                                    {!! Form::open(['action' => ['App\Http\Controllers\TicketController@refuse', $ticket->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
                                        {{Form::hidden('_method', 'PATCH')}}
                                        {{Form::submit(__('Refuse'), ['class' => 'btn btn-sm btn-danger'])}}
                                    {!! Form::close() !!}
                                </div>
                            @endif
                            
                        </td>
                        <td>
                            <div class="d-flex flex-row">
                                @if($ticket->isAssignedToUser() && $ticket->status == 'I')
                                    <div>
                                        {!! Form::open(['action' => ['App\Http\Controllers\TicketController@close', $ticket->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
                                            {{Form::hidden('_method', 'PATCH')}}
                                            {{Form::submit(__('Close'), ['class' => 'btn btn-sm btn-success'])}}
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                                <a href={{url('/tickets/'.$ticket->id)}} class="btn btn-sm btn-secondary mx-1">{{__('Details')}}</a>
                                @if($ticket->status != 'C')
                                    <a href={{url('/tickets/'.$ticket->id.'/edit')}} class="btn btn-sm btn-secondary mx-1">{{__('Edit')}}</a>
                                @endif
                                {!! Form::open(['action' => ['App\Http\Controllers\TicketController@destroy', $ticket->id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger mx-1'])}}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        
        {{$tickets->links()}}

    @else
        <p class="text-center">{{__('No data to display')}}</p>
    @endif
@endsection