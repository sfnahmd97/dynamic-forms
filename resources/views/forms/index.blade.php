<!-- resources/views/forms/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Forms') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <a href="{{ route('forms.create') }}" class="btn btn-primary">Create Form</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl.no</th>
                                    <th>Form</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forms as $form)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $form->name }}</td>
                                        <td>
                                            <a href="{{ route('forms.edit', $form) }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('forms.destroy', $form) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('forms.show', $form) }}" class="btn btn-info">Preview</a>
                                            <a href="{{ route('forms.submissions', $form) }}" class="btn btn-warning">Submissions</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
