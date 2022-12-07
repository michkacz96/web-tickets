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
                    <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tickets as $ticket)
                    <tr {{$ticket->getColorTable()}}>
                        <td>{{$ticket->created_at}}</td>
                        <td>{{$ticket->title}}</td>
                        <td>{{$ticket->description}}</td>
                        @if($ticket->ticketCategory != NULL)
                            <td>{{$ticket->ticketCategory->name}}</td>
                        @else
                            <td>{{__('Record deleted')}}</td>
                        @endif
                        @if($ticket->customer != NULL)
                            <td>{{$ticket->customer->name}}</td>
                        @else
                            <td>{{__('Record deleted')}}</td>
                        @endif
                        <td>{{__($ticket->getStatus())}}</td>
                        <td class="d-flex flex-row justify-content-evenly">
                            <a href={{url('/tickets/'.$ticket->id.'/edit')}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{__('Edit')}}</a>
                            {!! Form::open(['action' => ['App\Http\Controllers\TicketController@destroy', $ticket->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger btn-block'])}}
                            {!! Form::close() !!}
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