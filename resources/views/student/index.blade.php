@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-between">
        <div>
            <h2>{{ @$pageTitle }}</h2>
        </div>
        <!-- Button to Open the Modal -->
        <div class="ml-5">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add Student
            </button>
        </div>
    </div>
    <div>
        <table>
            <tr>
                <th>ID.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>{{ $student->status == 1 ? 'Active' : 'Disable' }}</td>
                    <td class="d-flex">
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-secondary mr-2">Edit</a>

                        <form method="POST" action="{{ route('student.delete', $student->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" name="deleteUser">Delete</button>
                        </form>

                        <a href="{{ route('student.addCourseMark', $student->id) }}" class="ml-2 btn btn-primary">Add Course Mark</a>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">NO RECORD FOUND</td>
                </tr>
            @endforelse
        </table>
        <div class="mt-5">
            {{ @$students->links() }}
        </div>
    </div>



    <!-- Add Student Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Student</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('student.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" id="name">
                            @if ($errors->has('name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
                            @if ($errors->has('name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Enter phone number"
                                   id="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="" class="form-control">
                                <option value="">Select Option</option>
                                <option value="1">Active</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

@endsection
