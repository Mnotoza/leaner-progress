@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f9fafb;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h2 {
        font-weight: 600;
        color: #007bff;
        margin-bottom: 20px;
    }
</style>
@section('content')
    <div class="container">
        <h2>Learner Progress Dashboard</h2>

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
                <label for="sort">Sort:</label>
                <select name="sort" id="sort">
                    <option value="">-- Default --</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name (A → Z)</option>
                    <option value="progress" {{ request('sort') == 'progress' ? 'selected' : '' }}>Progress (High → Low)
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
                @foreach($learners as $learner)
                    @foreach($learner->enrolments as $enrolment)
                        <tr>
                            <td>{{ $learner->firstname }} {{ $learner->lastname }}</td>
                            <td>{{ $enrolment->course->name }}</td>
                            <td>{{ $enrolment->progress ?? 'No progress yet' }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection