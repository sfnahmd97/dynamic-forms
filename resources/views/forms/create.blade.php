@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Form') }}</div>

                <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('forms.store') }}" method="POST" id="form-builder">
        @csrf
        <div class="form-group">
            <label for="name">Form Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div id="fields">
            @if (old('fields'))
                @foreach (old('fields') as $index => $field)
                    <div class="form-group field-group">
                        <label>Field Label</label>
                        <input type="text" name="fields[{{ $index }}][label]" class="form-control" value="{{ $field['label'] }}" required>

                        <label>Field Type</label>
                        <select name="fields[{{ $index }}][type]" class="form-control field-type" required>
                            <option value="text" {{ $field['type'] == 'text' ? 'selected' : '' }}>Text</option>
                            <option value="number" {{ $field['type'] == 'number' ? 'selected' : '' }}>Number</option>
                            <option value="email" {{ $field['type'] == 'email' ? 'selected' : '' }}>Email</option>
                            <option value="textarea" {{ $field['type'] == 'textarea' ? 'selected' : '' }}>Textarea</option>
                            <option value="select" {{ $field['type'] == 'select' ? 'selected' : '' }}>Select</option>
                        </select>


                        <div class="options-container" style="{{ $field['type'] == 'select' ? '' : 'display:none;' }}">
                            <label>Options</label>
                            <div class="options">
                                @if ($field['type'] == 'select' && isset($field['options']))
                                    @foreach ($field['options'] as $optionIndex => $option)
                                        <div class="form-group option-group">
                                            <input type="text" name="fields[{{ $index }}][options][{{ $optionIndex }}]" class="form-control" value="{{ $option }}" required>
                                            <button type="button" class="btn btn-danger remove-option">Remove Option</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-secondary add-option">Add Option</button>
                        </div>

                        <button type="button" class="btn btn-danger remove-field">Remove</button>
                    </div>
                @endforeach
            @endif
        </div>
        <button type="button" id="add-field" class="btn btn-primary">Add Field</button>
        <button type="submit" class="btn btn-success">Save Form</button>
    </form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/form/dynamic.js') }}"></script>
@endsection
