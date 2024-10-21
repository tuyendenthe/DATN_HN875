@extends('admins.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Cập nhật Flash Sale cho sản phẩm</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cập Nhật Flash Sale</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('flash_sale.update', $flashSale->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Chọn Sản Phẩm</label>
                                <select class="form-control" name="product_id" required>
                                    @foreach ($products as $product)
                                        @if($flashSale->product_id == $product->id)
                                            <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                                        @else
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Ngày Hết Hạn</label>
                                <input type="datetime-local" name="time_end" class="form-control" value="{{ old('time_end', \Carbon\Carbon::parse($flashSale->time_end)->format('Y-m-d\TH:i')) }}" required>
                                @error('time_end')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
@endsection
