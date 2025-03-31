@extends('admins.master')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100  p-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h1 class="mb-0">Thêm danh mục sản phẩm</h1>
                    {{-- <a href="{{route('categories.create')}}" class="btn btn-success">Lưu</a> --}}
                </div>
                <div class="col-md-10">
                    <form action="{{route('categories.store')}}" method="POST">
                        @csrf
                        <div class="col-md-12 mt-3">
                            <label for="">Nhập tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Mô tả</label>
                            <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                        </div>
                        <button class="btn-success btn mt-3 d-flex justify-content-end">
                            Lưu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
