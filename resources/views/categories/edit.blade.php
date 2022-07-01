
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                   <h2>edit category</h2>
                    </div><!-- card-header -->

                <div class="card-body text-center">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                        <form action="{{ route('categories.update',['id'=>$category->id]) }}" method="post">
                            @csrf
                            <input type="text" name="name" value="{{$category->name}}" class="form-control form-control-lg mb-3" placeholder="Category Name">
                            <button type="submit" class="btn btn-primary btn-lg">Update Category</button>
                        </form>

                </div><!-- card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

