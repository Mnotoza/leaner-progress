@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="container">
        <!-- <h2>Learner Progress Dashboard</h2> -->

        <form method="GET" class="filters">
            <div class="filter-group">
                <label for="course">Course:</label>
                <select name="course" id="course">
                    <option value="">-- All Courses --</option>
                    @foreach(\App\Models\Course::all() as $course)
                        <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="filter-group">
                <label for="sort_progress">Sort by Progress:</label>
                <select name="sort_progress" id="sort_progress">
                    <option value="">-- None --</option>
                    <option value="asc" {{ request('sort_progress') == 'asc' ? 'selected' : '' }}>
                        Progress (%) Ascending
                    </option>
                    <option value="desc" {{ request('sort_progress') == 'desc' ? 'selected' : '' }}>
                        Progress (%) Descending
                    </option>
                </select>
            </div>

            <button type="submit">Apply Filters</button>
        </form>


        <table>
            <thead>
                <tr>
                    <th>Learner</th>
                    <th>Course</th>
                    <th>Progress (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progress as $enrollment)
                    <tr>
                        <td>{{ $enrollment->learner->name }}</td>
                        <td>{{ $enrollment->course->name }}</td>
                        <td>{{ $enrollment->progress }}%</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection