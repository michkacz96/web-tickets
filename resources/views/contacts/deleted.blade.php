@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('contacts.phones')}}">{{__('Go to list of phones')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('contacts.emails')}}">{{__('Go to list of emails')}}</a>
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
              <th scope="col">{{__('Deleted date')}}</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->customer->name}}</td>
                    <td>{{$contact->value}}</td>
                    <td>{{$contact->tags}}</td>
                    <td>{{$contact->deleted_at}}</td>
                    <td class="d-flex flex-row justify-content-evenly">
                        {!! Form::open(['action' => ['App\Http\Controllers\CustomerContactController@restore', $contact->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                            {{Form::submit(__('Restore'), ['class' => 'btn btn-sm btn-secondary btn-block'])}}
                        {!! Form::close() !!}
                        {!! Form::open(['action' => ['App\Http\Controllers\CustomerContactController@forceDelete', $contact->id], 'method' => 'POST', 'class' => 'float-end']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit(__('Delete forever'), ['class' => 'btn btn-sm btn-danger btn-block'])}}
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