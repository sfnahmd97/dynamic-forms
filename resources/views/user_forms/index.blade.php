@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Forms</h1>
        <ul class="list-group">
            @forelse ($forms as $form)
                <li class="list-group-item">
                    <a href="{{ route('user_forms.show', $form->id) }}">{{ $form->name }}</a>
                </li>
            @empty
                <li class="list-group-item">
                    No forms available.
                </li>
            @endforelse
        </ul>
    </div>
@endsection
