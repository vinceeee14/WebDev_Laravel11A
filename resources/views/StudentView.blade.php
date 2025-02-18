@extends('base')
@section('title', 'Web Dev2_laravel11')

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Gender</th>
      </tr>
    </thead>
    <tbody>
     @foreach($students as $student)
     <tr>
        <th scope = "row">{{$student->id}}</th>
        <th>{{$student->name}}</th>
        <th>{{$student->age}}</th>
        <th>{{$student->gender}}</th>
     </tr>
     @endforeach
    </tbody>
  </table>
