@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('tickets.index')}}">{{__('Go to list of tickets')}}</a>
        </li>
    </ul>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <table class="table table-striped table-hover">
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
                <tr>
                    <th scope="col">{{__('Assigned to')}}</th>
                    <td>
                        {{$ticket->getNameAssignedTo()}}
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
                </tr>
            </table>
            <a href={{route('ticket-details.create', ['ticket' => $ticket->id])}}>{{__('New detail')}}</a>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

              <div class="card my-2">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div><!--End of the timeline section -->
    </div>
@endsection