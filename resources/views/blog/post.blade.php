@extends('layouts.home')

@section('page')
    <div class="container mt-5 justify-content-center" style="max-width:700px">
        <div class="card shadow-sm">
            <div class="card-header text-center text-body-emphasis bg-body-secondary">
                <h3>Create a New Blog Post</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('publish') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" required>
                    </div>

                    <!-- Content Field -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="6" placeholder="Write your blog content here..." required></textarea>
                    </div>

                    <!-- Image Upload Field -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Submit Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection