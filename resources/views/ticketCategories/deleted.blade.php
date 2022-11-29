@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-start">
        <a href="{{route('ticket-categories.index')}}" class="btn btn-primary btn-block">{{__('Go to list of ticket categories')}}</a>
    </div>
    
    <hr class="my-3">
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
                        <td>{{$ticketCategory->deleted_at}}</td>
                        <td class="d-flex flex-row justify-content-evenly">
                            {!! Form::open(['action' => ['App\Http\Controllers\TicketCategoryController@restore', $ticketCategory->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                                {{Form::submit(__('Restore'), ['class' => 'btn btn-sm btn-secondary btn-block'])}}
                            {!! Form::close() !!}
                            {!! Form::open(['action' => ['App\Http\Controllers\TicketCategoryController@forceDelete', $ticketCategory->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit(__('Delete forever'), ['class' => 'btn btn-sm btn-danger btn-block'])}}
                            {!! Form::close() !!}
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