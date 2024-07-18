@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Submissions for') }} {{ $form->name }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Submission Data</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($form->submissions as $submission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <pre><a href="{{ route('forms.submissions_show', $submission) }}" class="btn btn-info">Preview</a></pre>
                                    </td>
                                    <td>{{ $submission->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" align="center">No Submissions available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
