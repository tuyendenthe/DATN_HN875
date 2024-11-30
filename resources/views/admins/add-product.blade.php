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
        <form action="{{ route('products.addPostProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    Tên:
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    @error('name')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class='col-12'>
                    <label for="">Giá</label>
                    <input type="number" name='price' class='form-control' value="{{ old('price') }}">
                    @error('price')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class='col-12'>
                    <label for="">Loại sản phẩm</label>
                    <select name="category_id" class="form-control" id="" required>
                            @foreach ($Categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                    </select>
                </div>
                {{-- <div class="col-12">
                    Giá:
                    <input type="number" name="price" class="form-control">
                    @error('price')
                        <span class="">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="col-12">
                    Ảnh:
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Mô tả ngắn:
                    <input type="text" name="content_short" value="{{ old('content_short') }}" class="form-control">
                    @error('content_short')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    Mô Tả:
                    <input type="text" name="content" value="{{ old('content') }}" class="form-control">
                    @error('content')
                        <span class="" style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <button>Thêm mới</button>
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
