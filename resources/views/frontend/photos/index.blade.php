@extends('layouts.main')
@push('title')
<title>Upload Data</title>
@endpush
@section('main-section')

<div class="container">
  <h2 class="text-center">Bordered Table</h2>
  <div class="mb-2">
    <a href="{{route('photos-upload')}}"><button type="button" class="btn btn-primary">Upload Data</button></a> 
  </div>

  
    
  {{-- {{dd($image_details)}} --}}
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($image_details as $item)
          
      
      <tr>
        <div class="col-sm-4">
          <p class="text-center"><strong>{{$item->name}}</strong></p><br>
          <a href="#demo2" data-toggle="collapse">
            <img src="{{asset('storage/uploads/'.$item->image)}}" class="img-circle person" alt="San Francisco" width="400" height="300">
          </a>
        </div>
        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection