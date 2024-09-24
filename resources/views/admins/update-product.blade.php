@extends('admins.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="{{ route('products.updatePutProduct', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12">
                    Tên:
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    @error('name')
                        <span class="">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Giá:
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                    @error('price')
                        <span class="">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Ảnh:
                    <input type="file" name="image" class="form-control">
                    @if (isset($product) && $product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100">
                    @endif
                </div>
                <div class="col-12">
                    Mô tả ngắn:
                    <input type="text" name="content_short" class="form-control" value="{{ $product->content_short }}">
                    @error('content_short')
                        <span class="">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Mô Tả:
                    <input type="text" name="content" class="form-control" value="{{ $product->content }}">
                    @error('content')
                        <span class="">{{ $message }}</span>
                    @enderror
                </div>

                <button>Chỉnh sửa</button>
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
