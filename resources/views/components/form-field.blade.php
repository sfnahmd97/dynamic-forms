<div class="form-group">
    <label>{{ $field['label'] }}</label>
    @if ($field['type'] == 'text')
        <input type="text" class="form-control" name="{{ $field['name'] }}">
    @elseif ($field['type'] == 'number')
        <input type="number" class="form-control" name="{{ $field['name'] }}">
    @elseif ($field['type'] == 'email')
        <input type="email" class="form-control" name="{{ $field['name'] }}">
    @elseif ($field['type'] == 'textarea')
        <textarea class="form-control" name="{{ $field['name'] }}"></textarea>
    @elseif ($field['type'] == 'select')
        <select class="form-control" name="{{ $field['name'] }}">
            @foreach (explode(',', $field['options']) as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    @endif
</div>
