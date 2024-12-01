@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">All Surveys</h2>

    <!-- Search Bar -->
    <div class="row mb-3">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('surveys.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by Circle, Division, or Work Order" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if($surveys->isEmpty())
        <p class="text-center">No surveys found.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Circle</th>
                        <th>Division</th>
                        <th>Sub Division</th>
                        <th>Work Order</th>
                        <th>Completion Date</th>
                        <th>Survey Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveys as $survey)
                        <tr>
                            <td>{{ $survey->circle }}</td>
                            <td>{{ $survey->division }}</td>
                            <td>{{ $survey->sub_division }}</td>
                            <td>{{ $survey->work_order }}</td>
                            <td>{{ $survey->completion_date->format('Y-m-d') }}</td>
                            <td>{{ $survey->survey_date->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <a href="{{ route('surveys.show', $survey->id) }}" class="btn btn-info btn-sm" title="View Survey">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('surveys.edit', $survey->id) }}" class="btn btn-warning btn-sm" title="Edit Survey">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Survey" onclick="return confirm('Are you sure you want to delete this survey?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $surveys->links() }}
        </div>
    @endif

    <!-- Button to add new survey -->
    <div class="text-center mt-4">
        <a href="{{ route('surveys.create') }}" class="btn btn-primary">Add New Survey</a>
    </div>
</div>
@endsection
