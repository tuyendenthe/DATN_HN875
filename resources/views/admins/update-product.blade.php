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
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                    {{-- @error('name')
                    <span class="" style="color: red">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div class="col-12">
                    Danh mục:
                    {{-- <input type="text" name="name" value="{{ old('name') }}" class="form-control"> --}}

                    {{-- <select name="category_id" class="form-control">
                        @foreach ($data as $value)


                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select> --}}
                    <select name="category_id" value="{{ $product->category_id }}"  class="form-control">
                        @foreach ($category as $val)
                            <option value="{{ $val->id }}" {{ $product->category_id == $val->id ? 'selected' : '' }}>
                                {{ $val->name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- @error('name')
                            <span class="" style="color: red">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div class='col-12'>
                    <label for="">Giá</label>
                    <input type="number" name='price' class='form-control' value="{{$product->price }}">
                    {{-- @error('price')
                    <span class="" style="color: red">{{ $message }}</span>
                    @enderror --}}
                </div>


            <div class="col-12">
                Ảnh:
                <input type="file" name="image" class="form-control">
                <img  src="{{ asset($product->image) }}" alt="" width="100">
                {{-- @error('image')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
                Chip :
                <input type="text" name="chip" value="{{ $product->chip }}" class="form-control">
                {{-- @error('chip')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
               Ram :
                <input type="text" name="ram" value="{{ $product->ram }}" class="form-control">
                {{-- @error('ram')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
                Màu Sắc :
                <input type="text" name="color" value="{{ $product->color }}" class="form-control">
                {{-- @error('color')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
                Bộ Nhớ:
                <input type="text" name="memory" value="{{ $product->memory }}" class="form-control">
                {{-- @error('memory')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
                Kích Thước Màn Hình:
                <input type="text" name="screen" value="{{ $product->screen }}" class="form-control">
                {{-- @error('screen')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
                Độ Phân Giải:
                <input type="text" name="resolution" value="{{ $product->resolution }}" class="form-control">
                {{-- @error('resolution')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
                Mô tả ngắn:
                <input type="text" name="content_short" value="{{ $product->content_short }}" class="form-control">
                {{-- @error('content_short')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
                Mô Tả: <br>
                {{-- <input type="text" name="content" value="{{ old('content') }}" class="form-control"> --}}
                <textarea name="content" class="form-control" id="editor1" value="{{$product->content }}" cols="152" rows="20"></textarea>
                {{-- @error('content')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">

                Loại Sản Phẩm:
                {{-- <label for="trang_thai">Trạng thái</label> --}}
                <select name="role" class="form-control">
                    <option value="1" {{ $product->role == 1 ? 'selected' : '' }}>Sản Phẩm Thường</option>
                    <option value="2" {{ $product->role == 2 ? 'selected' : '' }}>Sản Phẩm Nổi Bật</option>
                </select>

                {{-- <input type="text" name="content" value="{{ old('content') }}" class="form-control"> --}}
                {{-- @error('role')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">
            <button  class="btn btn-primary form-control mt-4">Thêm mới</button>
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
