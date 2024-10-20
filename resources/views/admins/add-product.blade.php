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
        <form class="form-control" action="{{ route('products.addPostProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    Tên:
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    @error('name')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Giá:
                    <input type="number" name="price" class="form-control">
                    @error('price')
                        <span class="">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Ảnh:
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Mô tả ngắn:
                    <br>
                    {{-- <input type="text" name="content_short" value="{{ old('content_short') }}" class="form-control"> --}}

                    <textarea name="content_short" id="" value="{{ old('content_short') }}"  class="form-control"  cols="30" rows="10"></textarea>
                    @error('content_short')
                    <span class="" style="color: red">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-12">
                    Mô Tả:
                    {{-- <input type="text" name="content" value="{{ old('content') }}" class="form-control"> --}}
                    <textarea name="content" id="" value="{{ old('content') }}"  class="form-control"  cols="30" rows="10"></textarea>
                    @error('content')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <button class="form-control m-2 btn btn-primary">Thêm mới</button>
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
