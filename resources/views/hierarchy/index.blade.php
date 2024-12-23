@extends('layouts.app')


@section('content')
<ul>
    @foreach($hierarchies as $user)
        <li>{{ $user->name }}
            @if(count($user->subordinates) > 0)
                <ul>
                    @foreach($user->subordinates as $subordinate)
                        <li>{{ $subordinate->name }}</li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>

<a href="{{ route('hierarchy.assign') }}">Assign Hierarchy</a>
@endsection
