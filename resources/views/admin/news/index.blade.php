@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <section class="section">
            <div class="section-header">
                <h1>Categories</h1>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h4>All Categories</h4>
                    <div class="card-header-action">
                        <a href="{{ route('add-news') }}" class='btn btn-primary'>
                            <i class="fas fa-plus"></i>Create new category
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tab-bordered" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-news" role="tabpanel" aria-labelledby="home-tab1">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-news">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th>Image</th>
                                            <th style="width: 40%">Title</th>
                                            <th>Category</th>
                                            <th>Breaking</th>
                                            <th>Status</th>
                                            <th>Approve</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" width="100" alt="">
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>
                                                    @if ($item->is_breaking_news == 1)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-warning">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-warning">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->is_approved == 1)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-warning">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit-news', $item->id) }}" class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('delete-news', $item->id) }}"
                                                        class="btn btn-danger delete-item">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center" style="display: flex;
                    justify-content: center;">
                            <!-- Pagination -->
                            {{ $news->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
