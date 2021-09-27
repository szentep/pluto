@extends('layouts.app')

@section('title')
    New todo
@endsection

@section('content')


    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Title"/>
        <input type="text" name="description" placeholder="Description"/>

        <button type="submit">Create</button>
        
    </form>

@endsection