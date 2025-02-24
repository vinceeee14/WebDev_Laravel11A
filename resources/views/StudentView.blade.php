@extends('base')
@section('title', 'Web Dev2_laravel11')

<div class="container">
    @if ('succes')
    <div class="alert alert-success" role="alert">
        {{session('success')}}
</div>
@endif

<!-- Add Student Button -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Student
</button>

<div class="row">
  <div class="col-12">
      <h1>WEB DEV Activity</h1>
      <table class="table">
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach($students as $student)
              <tr>
                  <td>{{$student->id}}</td>
                  <td>{{$student->name}}</td>
                  <td>{{$student->age}}</td>
                  <td>{{$student->gender}}</td>
                  <td>
                      <!-- Edit Button -->
                      <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $student->id }}">
                          <i class="bi bi-pencil"></i>
                      </button>

                      <!-- Delete Button -->
                      <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $student->id }}">
                          <i class="bi bi-trash"></i>
                      </button>
                  </td>
              </tr>

              <!-- Edit Student Modal -->
              <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form method="post" action="{{ route('std.update', $student->id) }}">
                                  @csrf
                                  @method('PUT')

                                  <div class="mb-3">
                                      <label class="form-label">Name</label>
                                      <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                                  </div>

                                  <div class="mb-3">
                                      <label class="form-label">Age</label>
                                      <input type="text" class="form-control" name="age" value="{{ $student->age }}">
                                  </div>

                                  <div class="mb-3">
                                      <label class="form-label">Gender</label>
                                      <input type="text" class="form-control" name="gender" value="{{ $student->gender }}">
                                  </div>

                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Delete Confirmation Modal -->
              <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Delete Student</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <p>Are you sure you want to delete <strong>{{ $student->name }}</strong>?</p>
                          </div>
                          <div class="modal-footer">
                              <form method="POST" action="{{ route('std.delete', $student->id) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                              </form>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </tbody>
      </table>
  </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create New Student</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{route('std.create')}}">
                  @csrf
                  
                  <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name='name' value="{{old('name')}}" placeholder="Enter your name">
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="age" class="form-label">Age</label>
                      <input type="text" class="form-control" name='age' value="{{old('age')}}" placeholder="Enter your age">
                      @error('age')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="gender" class="form-label">Gender</label>
                      <input type="text" class="form-control" name='gender' value="{{old('gender')}}" placeholder="Enter your gender">
                      @error('gender')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
          </div>
      </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  </div>


