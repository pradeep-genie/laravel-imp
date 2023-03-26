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
        <form method="post" action="{{route('photos-upload')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>

            <div class="form-group">
                <label for="image">Select Image:</label>
                <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
            </div>

            <div class="m-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
