@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Categories</h4>
                <div class="card-header-action">
                    <a href="{{ route('add-category') }}" class='btn btn-primary'>
                        <i class="fas fa-plus"></i>Create new category
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content tab-bordered" id="myTab3Content">

                    <div class="tab-pane fade show active" id="home-categories" role="tabpanel"
                        aria-labelledby="home-categories">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-categories">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Name</th>
                                            <th>In Nav</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->show_at_nav == 1)
                                                        <span class='badge badge-primary'>Yes</span>
                                                    @else
                                                        <span class='badge badge-warning'>No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($category->status == 1)
                                                        <span class='badge badge-success'>Yes</span>
                                                    @else
                                                        <span class='badge badge-warning'>No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit-category', $category->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('delete-category', $category->id) }}"
                                                        class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center"
                            style="display: flex;
                            justify-content: center;">
                            <!-- Pagination -->
                            {{ $categories->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
