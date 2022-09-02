@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-between">
        <div>
            <h2>{{ @$pageTitle }}</h2>
        </div>
        <!-- Button to Open the Modal -->
    </div>
    <div>
        <form id="updateEditModal" action="{{ route('student.storeCourseMark', $student->id) }}" method="post">
            @csrf

            <div class="form-group">
                <label for="course_id">Courses:</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">Select Option</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Course Mark:</label>
                <input type="number" min="0" step="any" name="mark" class="form-control mark" value="" placeholder="Enter course mark" id="name" required>
                @if ($errors->has('name'))
                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

@push('script')
    <script>
        "use strict"

        $('#course_id').on('change', function (){
            var course_id = this.value;
            var student_id = "{{ $student->id }}"
            $.ajax({
                type: "GET",
                url: "{{route('student.get-course-mark')}}",
                data: {"student_id": student_id, "course_id": course_id},
                datatype: "json",
                success: function (response) {
                    $('.mark').val(response.mark)
                },
                error: function () {

                },
            });
        });
    </script>
@endpush

