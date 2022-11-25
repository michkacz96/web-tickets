@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-start">
        <a href="{{url($language.'/ticket-categories/create')}}" class="btn btn-primary btn-block">{{$texts['BTN_CREATE_CATEGORY']}}</a>
    </div>
    
    <hr class="my-3">
    @if(count((is_countable($ticketCategories)?$ticketCategories:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">{{$texts['TEXT_NAME']}}</th>
                  <th scope="col">{{$texts['TEXT_DESCRIPTION']}}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($ticketCategories as $ticketCategory)
                    <tr>
                        <td>{{$ticketCategory->name}}</td>
                        <td>{{$ticketCategory->description}}</td>
                        <td>
                            <a href={{url($language.'/ticket-categories/'.$ticketCategory->id.'/edit')}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{$texts['BTN_EDIT']}}</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
    @else
        <p class="text-center">{{$texts['NO_DATA_MSG']}}</p>
    @endif
@endsection