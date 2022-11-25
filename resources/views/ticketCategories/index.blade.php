@extends('layouts.app')

@section('content')
    <a href="{{url('/ticket-categories/create')}}" class="btn btn-primary btn-block">{{$texts['CREATE_NEW_BUTTON_TICKET_CATEGORY']}}</a>
    <hr class="my-3">
    @if(count((is_countable($ticketCategories)?$ticketCategories:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">{{$texts['TABLE_COL_NAME']}}</th>
                  <th scope="col">{{$texts['TABLE_COL_DESCRIPTION']}}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($ticketCategories as $ticketCategory)
                    <tr>
                        <td>{{$ticketCategory->name}}</td>
                        <td>{{$ticketCategory->description}}</td>
                        <td>
                            <a href={{url('/ticket-categories/'.$ticketCategory->id.'/edit')}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{$texts['BTN_EDIT']}}</a>
                            <a href={{url('/ticket-categories/'.$ticketCategory->id)}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{$texts['BTN_SHOW']}}</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
    @else
        <p class="text-center">{{$texts['NO_DATA_MSG']}}</p>
    @endif
@endsection