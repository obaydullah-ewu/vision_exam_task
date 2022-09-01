@extends('layouts.app')

@section('content')
    <h2>{{ @$pageTitle }}</h2>
    <table>
        <tr>
            <th>ID.</th>
            <th>Name</th>
            <th class="text-center">Status</th>
            <th class="text-center">Total Student</th>
        </tr>
        @forelse($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td class="text-center">
                    @if($course->status == 1)
                        <button class="btn btn-primary">Active</button>
                    @else
                        <button class="btn btn-danger">Disable</button>
                    @endif

                </td>
                <td class="text-center">{{ $course->students_count }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">NO RECORD FOUND</td>
            </tr>
        @endforelse
    </table>
    <div class="mt-5">
    {{ @$courses->links() }}
    </div>
@endsection
