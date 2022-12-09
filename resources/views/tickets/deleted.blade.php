@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('tickets.index')}}">{{__('Go to list of tickets')}}</a>
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
                    <th scope="col">{{__('Date deleted')}}</th>
                    <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->getLocalCreatedAt()}}</td>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->description}}</td>
                    <td>{{__($ticket->getNameTicketCategory())}}</td>
                    <td>{{__($ticket->getNameCustomer())}}</td>
                    <td>{{__($ticket->getStatusName())}}</td>
                    <td>{{$ticket->getLocalDeletedAt()}}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-end">
                            {!! Form::open(['action' => ['App\Http\Controllers\TicketController@restore', $ticket->id], 'method' => 'POST', 'class' => 'mx-1']) !!}
                                {{Form::submit(__('Restore'), ['class' => 'btn btn-sm btn-secondary'])}}
                            {!! Form::close() !!}
                            {!! Form::open(['action' => ['App\Http\Controllers\TicketController@forceDelete', $ticket->id], 'method' => 'POST', 'class' => 'mx-1']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit(__('Delete forever'), ['class' => 'btn btn-sm btn-danger'])}}
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