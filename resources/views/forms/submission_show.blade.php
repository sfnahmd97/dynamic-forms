@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Submission Details for') }} {{ $submission->form->name }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Submitted At</label>
                            <p>{{ $submission->created_at }}</p>
                        </div>
                        @foreach (json_decode($submission->data, true) as $key => $value)
                            <div class="form-group">
                                <label>{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                <p>{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
