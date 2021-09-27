@extends('layouts.app')

@section('title')
    @lang('todo.todos')
@endsection

@section('content')

    <div class="card">
        <div class="card-content">
            {{-- Link to create new todo --}}
            <a href="{{ route('todos.create') }}" class="btn right">
                @lang('todo.create')
            </a>
            {{-- Show how much todo has been completed --}}
            <blockquote>
                @lang('todo.stat', ['completed' => $completed_count, 'expired' => $expired_count])
            </blockquote>
            
            <table>
                <thead>
                    <tr>
                        <th>@lang('todo.name')</th>
                        <th>@lang('todo.desc')</th>
                        <th>@lang('todo.expire')</th>
                        <th>@lang('todo.state')</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo->name }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>
                                <nobr>{{ $todo->expiration_date }}</nobr>
                            </td>
                            {{-- Nobr: do not brake the line, may not work on every browser --}}
                            <td>
                                @if ($todo->completed)
                                    @lang('todo.done')
                                @else
                                    @if ($todo->expiration_date < Date::now())
                                        @lang('todo.expired')
                                    @else
                                        @lang('todo.in_progress')
                                    @endif
                                @endif
                            </td>
                            <td>
                                {{-- with POST --}}
                                <form action="{{ route('todos.mark_as_done', $todo->id) }}" method="POST">
                                    {{-- {todo} behelyettesitodik --}}
                                    @csrf
                                    <button type="submit" class="btn">@lang('todo.done')</button>
                                </form>
                                {{-- with Get --}}
                                {{-- <a href="{{ route('todos.mark_as_done', $todo->id) }}">Done</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
