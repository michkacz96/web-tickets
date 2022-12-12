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
                        @if($ticket->isAssignedToUser())
                            {!! Form::open(['action' => ['App\Http\Controllers\TicketController@accept', $ticket->id], 'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'PATCH')}}
                                {{Form::submit(__('Accept'), ['class' => 'btn btn-link'])}}
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6"></div>
    </div>
@endsection