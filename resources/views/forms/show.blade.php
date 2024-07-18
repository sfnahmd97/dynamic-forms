@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ $form->name }}</h1>
        @foreach ($form->fields as $field)
            <div class="form-group">
                <label>{{ $field->label }}</label>
                @if ($field->type == 'select')
                    <select name="{{ $field->name }}" class="form-control">
                        @foreach (explode(',', $field->options) as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                @elseif ($field->type == 'textarea')
                    <textarea name="{{ $field->name }}" class="form-control"></textarea>
                @else
                    <input type="{{ $field->type }}" name="{{ $field->name }}" class="form-control">
                @endif
            </div>
        @endforeach
        <button class="btn btn-success">Submit</button>
</div>
@endsection
