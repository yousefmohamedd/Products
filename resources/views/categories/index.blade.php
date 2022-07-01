@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                   <h2>All Categories</h2>
                    </div><!-- card-header -->

                <div class="card-body text-center">

                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                       <table class="table table-bordered table-striped table-dark table-hover">
                          <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                <th>{{ $category->id }}</th>
                                <th>{{ $category->name }}</th>
                                <th><a href="{{ route('categories.edit', ['id'=>$category->id]) }}" class="text-warning"><i class="fa fa-edit"></i></a></th>
                                <th><a href="{{ route('categories.destroy', ['id'=>$category->id]) }}" class="text-danger"><i class="fa fa-trash"></i></a></th>
                            </tr>
                            @endforeach
                          </tbody>
                       </table>
                </div><!-- card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
