@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('ticket-categories.index')}}">{{__('Go to list of ticket categories')}}</a>
        </li>
    </ul>
    <hr>
    
    @if(count((is_countable($ticketCategories)?$ticketCategories:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">{{__('Name')}}</th>
                  <th scope="col">{{__('Description')}}</th>
                  <th scope="col">{{__('Date deleted')}}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($ticketCategories as $ticketCategory)
                    <tr>
                        <td>{{$ticketCategory->name}}</td>
                        <td>{{$ticketCategory->description}}</td>
                        <td>{{$ticketCategory->getLocalDeletedAt()}}</td>
                        <td>
                            <div class="d-flex flex-row justify-content-end">
                                {!! Form::open(['action' => ['App\Http\Controllers\TicketCategoryController@restore', $ticketCategory->id], 'method' => 'POST', 'class' => 'mx-1']) !!}
                                    {{Form::submit(__('Restore'), ['class' => 'btn btn-sm btn-secondary'])}}
                                {!! Form::close() !!}
                                {!! Form::open(['action' => ['App\Http\Controllers\TicketCategoryController@forceDelete', $ticketCategory->id], 'method' => 'POST', 'class' => 'mx-1']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit(__('Delete forever'), ['class' => 'btn btn-sm btn-danger'])}}
                                {!! Form::close() !!}
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        
        {{$ticketCategories->links()}}

    @else
        <p class="text-center">{{__('No data to display')}}</p>
    @endif
@endsection