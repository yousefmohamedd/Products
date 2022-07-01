@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                   <h2>All Products</h2>
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
                                <th>Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>details</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $i=1?>
                            @foreach ($products as $product)
                                <tr>
                                <th>{{ $i++ }}</th>
                                <th>{{ $product->title }}</th>
                                <th>{{ $product->price }}</th>
                                <th> <img src="{{asset('images/'.$product->image)  }}" height="50" alt=""> </th>
                                <th><a href="{{ route('products.show', ['id'=>$product->id]) }}" class="text-warning"><i class="fa fa-eye"></i></a></th>
                                <th><a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="text-warning"><i class="fa fa-edit"></i></a></th>
                                <th><a href="{{ route('products.destroy', ['id'=>$product->id]) }}" class="text-danger"><i class="fa fa-trash"></i></a></th>
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
