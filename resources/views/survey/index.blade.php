{{-- @extends('layouts.app')

@section('title', 'All Surveys')

@section('content')
    <h1>All Surveys</h1>

    @if($surveys->isEmpty())
        <p>No surveys found.</p>
    @else
        <ul>
            @foreach($surveys as $survey)
                <li>{{ $survey->circle }} - {{ $survey->division }}</li>
            @endforeach
        </ul>
    @endif
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">All Surveys</h2>

    @if($surveys->isEmpty())
        <p class="text-center">No surveys found.</p>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Circle</th>
                    <th>Division</th>
                    <th>Sub Division</th>
                    <th>Work Order</th>
                    <th>Completion Date</th>
                    <th>Survey Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surveys as $survey)
                    <tr>
                        <td>{{ $survey->circle }}</td>
                        <td>{{ $survey->division }}</td>
                        <td>{{ $survey->sub_division }}</td>
                        <td>{{ $survey->work_order }}</td>
                        <td>{{ $survey->completion_date }}</td>
                        <td>{{ $survey->survey_date }}</td>
                        <td>
                            <a href="{{ route('surveys.show', $survey->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('surveys.edit', $survey->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this survey?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Button to add new survey -->
    <div class="text-center mt-4">
        <a href="{{ route('surveys.create') }}" class="btn btn-primary">Add New Survey</a>
    </div>
</div>
@endsection

