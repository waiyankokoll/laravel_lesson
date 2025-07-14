@extends('backend.layout')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">create categories</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.
    </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit categories</h6>
            <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" placeholder="Enter student name">

                    <label for="age" class="form-label mt-3">Student Age</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $student->age) }}" placeholder="Enter student age">

                    <label for="gender" class="form-label mt-3">Student Gender</label>
                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>

                    <label for="birthday" class="form-label mt-3">Student Birthday</label>
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday', $student->birthday) }}">

                    <label for="address" class="form-label mt-3">Student Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter student address">{{ old('address', $student->address) }}</textarea>
                    <br>
                    @error('name,age,gender,birthday,address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>

        </div>
    </div>
@endsection