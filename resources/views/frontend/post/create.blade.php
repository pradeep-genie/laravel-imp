@extends('layouts.main')
@push('title')
    <title>create post</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endpush
@section('main-section')
    <div class="container">
        <div class="mb-2 text-center">
            <h2>Create Post</h2>
        </div>
        <form id="frm">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <input type="text" class="form-control" id="desc" placeholder="Enter description" name="description">
            </div>

            <div class="m-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    <script>
        $("#frm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                type:"post",
                url: "/post-store",
                data: $('#frm').serialize(),
                success: function(result) {
                    $("#frm").trigger("reset");
                }
            });
        })
    </script>
@endsection
