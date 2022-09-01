@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-between">
        <div>
            <h2>{{ @$pageTitle }}</h2>
        </div>
        <!-- Button to Open the Modal -->
    </div>
    <div>
        <form id="updateEditModal" action="{{ route('student.update', $student->id) }}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $student->name }}" placeholder="Enter email" id="name">
                @if ($errors->has('name'))
                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" class="form-control" value="{{ $student->email }}" placeholder="Enter email" id="email">
                @if ($errors->has('name'))
                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" class="form-control" value="{{ $student->phone_number }}" placeholder="Enter phone number" id="phone_number">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="" class="form-control">
                    <option value="">Select Option</option>
                    <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $student->status == 1 ? '' : 'selected' }}>Disable</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

