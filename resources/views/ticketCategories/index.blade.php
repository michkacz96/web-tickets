@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-start">
        <a href="{{route('ticket-categories.create')}}" class="btn btn-primary btn-block">{{__('Create new ticket category')}}</a>
    </div>
    
    <hr class="my-3">
    @if(count((is_countable($ticketCategories)?$ticketCategories:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">{{__('Name')}}</th>
                  <th scope="col">{{__('Description')}}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($ticketCategories as $ticketCategory)
                    <tr>
                        <td>{{$ticketCategory->name}}</td>
                        <td>{{$ticketCategory->description}}</td>
                        <td>
                            <a href={{url('/ticket-categories/'.$ticketCategory->id.'/edit')}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{__('Edit')}}</a>
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