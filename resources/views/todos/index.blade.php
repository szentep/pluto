@extends('layouts.app')

@section('title')
    Csináld meg ezeket
@endsection

@section('content')

<table>
    <thead>
      <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Expiration date</th>
          <th>Completed</th>
          <th></th>
      </tr>
    </thead>

    <tbody>
    @foreach ($todos as $todo)
        <tr>
            <td>{{ $todo->name }}</td>
            <td>{{ $todo->description }}</td>
            <td>{{ $todo->expiration_date }}</td>
            <td>{{ $todo->completed }}</td>
            <td>
                {{-- POST-al --}}
                <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                    @csrf
                    
                    <button type="submit" class="btn">Done</button>
                </form>
                {{-- Get-el --}}
                {{-- <a href="{{ route('todos.edit', $todo->id) }}">Done</a> --}}
            </td> 
        </tr>
    @endforeach
    </tbody>
</table>
@endsection