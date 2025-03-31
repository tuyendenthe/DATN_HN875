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
                                            <option  value="{{ $flashSale->productVariants->id }}">{{ $flashSale->productVariants->product->name }} | {{$flashSale->productVariants->ram}}GB - {{$flashSale->productVariants->memory}}GB</option>
                                </select>
                                @error('product_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Phần Trăm Giảm</label>
                                @php
                                    $percent_off = 0;
                                    if($flashSale->price_original > 0){
                                        $percent_off = (($flashSale->price_original - $flashSale->price_sale) / $flashSale->price_original) * 100;
                                    }
                                @endphp
                                <input type="number" min="1" max="100" name="percent" value="{{ $percent_off }}" placeholder="Nhập phần trăm giảm" class="form-control" required>
                                @error('percent')
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
