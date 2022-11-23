@extends('layouts.app')

@section('content')
    @if(count((is_countable($ticketCategories)?$ticketCategories:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($ticketCategories as $ticketCategory)
                    <tr>
                        <td>{{$ticketCategory->name}}</td>
                        <td>{{$ticketCategory->description}}</td>
                        <td>
                            <a href={{url('/ticket-categories/'.$ticketCategory->id.'/edit')}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">Edit</a>
                            <a href={{url('/ticket-categories/'.$ticketCategory->id)}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">Show</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
    @else
        <p class="text-center">{{$NO_DATA_MSG}}</p>
    @endif
@endsection