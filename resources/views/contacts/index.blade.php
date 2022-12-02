@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('contacts.create')}}">{{__('Add new contact')}}</a>
        </li>
    </ul>
    <hr>
    
    @if(count((is_countable($contacts)?$contacts:[])))
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">{{__('Name')}}</th>
                  <th scope="col">{{__('Value')}}</th>
                  <th scope="col">{{__('Tags')}}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->customer->name}}</td>
                        @if($contact->type == 'P')
                            <td><a href="tel:{{$contact->value}}">{{$contact->value}}</a></td>
                        @elseif($contact->type == 'E')
                            <td><a href="mailto:{{$contact->value}}">{{$contact->value}}</a></td>
                        @endif
                        <td>{{$contact->tags}}</td>
                        <td class="d-flex flex-row justify-content-evenly">
                            <a href={{url('/contacts/'.$contact->id)}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{__('Details')}}</a>
                            <a href={{url('/contacts/'.$contact->id.'/edit')}} class="btn btn-sm btn-secondary float-end mx-1 btn-block">{{__('Edit')}}</a>
                            {!! Form::open(['action' => ['App\Http\Controllers\CustomerContactController@destroy', $contact->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger btn-block'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        
        {{$contacts->links()}}

    @else
        <p class="text-center">{{__('No data to display')}}</p>
    @endif
@endsection