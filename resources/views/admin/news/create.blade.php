@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Categories</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('store-news') }}" method="POST" enctype="multipart/form-data"> <!-- Thêm enctype -->
                    @csrf

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">---Select---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image-upload">Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" class="form-control">
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input name="title" type="text" class="form-control" id="name">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control"></textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="control-label">Status</div>
                                <label for="status" class="custom-switch mt-2">
                                    <input type="checkbox" id="status" name="status" class="custom-switch-input"
                                        value="1">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="control-label">Is Breaking News</div>
                                <label for="is_breaking_news" class="custom-switch mt-2">
                                    <input type="checkbox" id="is_breaking_news" name="is_breaking_news"
                                        class="custom-switch-input" value="1">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="control-label">Approve</div>
                                <label for="is_approved" class="custom-switch mt-2">
                                    <input type="checkbox" id="is_approved" name="is_approved" class="custom-switch-input"
                                        value="1">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Category</button>
                </form>
            </div>
        </div>
    </section>
@endsection
