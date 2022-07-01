@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                   <h2> Product Details</h2>
                    </div><!-- card-header -->

                <div class="card-body text-center">

                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <img src="{{asset('images/'.$product->image)  }}" class="w-50" alt="">
                <h1>{{ $product->title }}</h1>
                                <h1>{{ $product->price }}</h1>
                                <h1>{{ $product->description }}</h1>

                </div><!-- card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
