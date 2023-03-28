@extends('layouts.main')
@push('title')
<title>Upload Data</title>
@endpush
@section('main-section')

<div class="container">
  <h2 class="text-center">Bordered Table</h2>
  <div class="mb-2">
    <a href="{{route('photos.create')}}"><button type="button" class="btn btn-primary">Upload Data</button></a> 
  </div>

  
    
  {{-- {{dd($image_details)}} --}}
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($image_details as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td><img src="{{asset('public/uploads/'.$item->image)}}" alt="San Francisco" width="400" height="300"></td>
        <td>
          <a href="{{route('photos.edit',$item->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection