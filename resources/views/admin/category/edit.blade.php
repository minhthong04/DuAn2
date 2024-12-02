@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
        </div>
    </section>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Edit Categories</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update-category', $category->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ $category->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="show_at_nav">Show at Nav?</label>
                    <select name="show_at_nav" id="show_at_nav" class="form-control select2">
                        <option value="0" {{ $category->show_at_nav == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ $category->show_at_nav == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                    @error('show_at_nav')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control select2">
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <input name="id" type="hidden" class="form-control" id="id" value="{{ $category->id }}">

                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection
