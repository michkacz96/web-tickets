@extends('layouts.app')

@section('content')
    <ul class="nav mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{url()->previous()}}">{{__('Go back')}}</a>
        </li>
    </ul>
    <hr>
    
    {!! Form::open(['url' => route('tasks.store'), 'action' => 'App\Http\Controllers\TaskListController@store', 'method' => 'POST']) !!}
        <div class="btn-group mb-2" role="group" aria-label="radio toggle button group">
            <input type="radio" class="btn-check" name="isPublic" id="is-private" autocomplete="off" value="private" checked>
            <label class="btn btn-outline-primary" for="is-private">{{__('Make list private')}}</label>
            <input type="radio" class="btn-check" name="isPublic" id="is-public" autocomplete="off" value="public">
            <label class="btn btn-outline-danger" for="is-public">{{__('Make list public')}}</label>
        </div>
          
        <div class="form-group">
            {!! Form::label('name', __('Task list name')) !!}
            {!! Form::text('name', old('name'), $atributes=['class' => 'form-control', 'placeholder' => __('Task list name')]) !!}
            @error('name')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('ticket', __('Category')) !!}
            {!! Form::select('ticket', $tickets, old('ticket'), $attributes=['class' => 'form-select']) !!}
            @error('ticket')
                <strong class="text-danger">{{ $message }}</strong>    
            @enderror
        </div>

        
        
        <div class="my-3">
            {{Form::submit(__('Add task list name'), ['class' => 'btn btn-primary float-end'])}}
        </div>
    {!! Form::close() !!}
@endsection