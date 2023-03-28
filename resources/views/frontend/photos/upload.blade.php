@extends('layouts.main')
@push('title')
    <title>Upload Data</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endpush
@section('main-section')
    <div class="container">
        <div class="mb-2 text-center">
            <h2>Upload Data</h2>
        </div>
        <form method="post" action="{{route('photos.store')}}" enctype="multipart/form-data">
            @csrf
            @if (isset($edit_image))
            <input type="hidden" class="form-control" value="{{isset($edit_image->id)}}" name="image_id">
            @endif

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{isset($edit_image->name)?$edit_image->name:''}}">
            </div>

            <div class="form-group">
                <label for="image">Select Image:</label>
                <input type="file" class="form-control" id="image" placeholder="Enter image" name="image" value="{{isset($edit_image->image)?$edit_image->image:''}}">
            </div>

            <div class="m-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
