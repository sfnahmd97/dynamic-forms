@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $form->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user_forms.show', $form->id) }}">
        @csrf
        @foreach ($form->fields as $field)
            <x-form-field :field="$field" />
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
