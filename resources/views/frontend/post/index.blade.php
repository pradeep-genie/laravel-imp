@extends('layouts.main')
@push('title')
<title>check the latest post</title>
@endpush
@section('main-section')

<div class="container">
  <h2 class="text-center">Bordered Table</h2>
  <div class="mb-2"><a href="{{url("/post-create")}}"><button type="button" class="btn btn-primary">Add Post</button></a> </div>
    
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>

@endsection