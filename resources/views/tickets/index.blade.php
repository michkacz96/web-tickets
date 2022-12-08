@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('tickets.create')}}">{{__('Create new ticket')}}</a>
        </li>
    </ul>
    <hr>

    @if(count((is_countable($tickets)?$tickets:[])))
        <table class="table table-hover">
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
                        <td>{{__($ticket->getNameTicketCategory())}}</td>
                        <td>{{__($ticket->getNameCustomer())}}</td>
                        <td>{{__($ticket->getStatus())}}</td>
                        <td>{{$ticket->getNameCreatedBy()}}</td>
                        <td>{!! $ticket->getNameAssignedTo() !!}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href={{url('/tickets/'.$ticket->id)}} class="btn btn-sm btn-secondary mx-1">{{__('Details')}}</a>
                                <a href={{url('/tickets/'.$ticket->id.'/edit')}} class="btn btn-sm btn-secondary mx-1">{{__('Edit')}}</a>
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