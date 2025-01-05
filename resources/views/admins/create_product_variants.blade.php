@extends('admins.master')

@section('content')
    <style>
        .alert {
            position: relative;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            transition: opacity 0.5s ease;
        }


    </style>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">

                <h4 class="page-title">Thêm mới thuộc tính sản phẩm</h4>

                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="{{ route('products.variants.store', $productId) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div id="globalError" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row">
                <input  type="hidden" name="product_id" value="{{ $productId }}" class="form-control" id="product_id">
                <div class="col-12">
                    RAM:
                    <input type="text" name="ram" value="{{ old('ram') }}" class="form-control" id="ram_product">
                    @error('ram')
                    <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    MEMORY:
                    <input type="text" name="memory" value="{{ old('memory') }}" class="form-control" id="memory_product">
                    @error('memory')
                    <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-12">
                    Quantity:
                    <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control">
                    @error('quantity')
                    <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    Price:
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                    @error('price')
                    <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <button class="btn btn-primary form-control mt-4">Thêm mới</button>
                </div>
            </div>
        </form>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>


@endsection
