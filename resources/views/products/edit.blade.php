
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                   <h2>Edit product</h2>
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

                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class="form-control form-control-lg mb-3" placeholder="Product title">

                    <select name="category_id" class="form-control form-select form-control-lg mb-3" id="">
                        <option>Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

            <input type="file" name="image" class="form-control-file form-control form-control-lg mb-3" >
            <input type="number" name="price" class="form-control form-control-lg mb-3" placeholder="Product Price">

            <textarea name="description" id=""  rows="5" class="form-control form-control-lg mb-3" placeholder="Product description"></textarea>
                    <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                </form>


                </div><!-- card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

