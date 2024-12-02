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
            <div class="col-12">
                Danh mục:
                {{-- <input type="text" name="name" value="{{ old('name') }}" class="form-control"> --}}

                <select name="category_id" class="form-control">
                    @foreach ($data as $value)


                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
                {{-- @error('name')
                        <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class='col-12'>
                <label for="">Giá</label>
                <input type="number" name='price' class='form-control' value="{{ old('price') }}">
                @error('price')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class='col-12'>
                <label for="">Loại sản phẩm</label>
                <select name="category_id" class="form-control" id="" required>
                    @foreach ($Categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div> --}}
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
            Chip :
            <input type="text" name="chip" value="{{ old('chip') }}" class="form-control">
            {{-- @error('chip')
            <span class="" style="color: red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="col-12">
           Ram :
            <input type="text" name="ram" value="{{ old('ram') }}" class="form-control">
            {{-- @error('ram')
            <span class="" style="color: red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="col-12">
            Màu Sắc :
            <input type="text" name="color" value="{{ old('color') }}" class="form-control">
            {{-- @error('color')
            <span class="" style="color: red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="col-12">
            Bộ Nhớ:
            <input type="text" name="memory" value="{{ old('memory') }}" class="form-control">
            {{-- @error('memory')
            <span class="" style="color: red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="col-12">
            Kích Thước Màn Hình:
            <input type="text" name="screen" value="{{ old('screen') }}" class="form-control">
            {{-- @error('screen')
            <span class="" style="color: red">{{ $message }}</span>
            @enderror --}}
        </div>
        <div class="col-12">
            Độ Phân Giải:
            <input type="text" name="resolution" value="{{ old('resolution') }}" class="form-control">
            @error('resolution')
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
            Mô Tả: <br>
            {{-- <input type="text" name="content" value="{{ old('content') }}" class="form-control"> --}}
            <textarea name="content" class="form-control" id="editor1" value="{{ old('content') }}" cols="152" rows="20"></textarea>
            @error('content')
            <span class="" style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">

            Loại Sản Phẩm:
            {{-- <label for="trang_thai">Trạng thái</label> --}}
            <select name="role" class="form-control">
                <option value="1">Sản Phẩm Thường</option>
                <option value="2">Sản Phẩm Nổi Bật</option>
            </select>
            {{-- <input type="text" name="content" value="{{ old('content') }}" class="form-control"> --}}
            @error('role')
            <span class="" style="color: red">{{ $message }}</span>
            @enderror
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then(file => {
                    return new Promise((resolve, reject) => {
                        const formData = new FormData();
                        formData.append('upload', file);

                        fetch('/upload-image', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data && data.url) {
                                    resolve({
                                        default: data.url, // Đường dẫn ảnh trả về
                                    });
                                } else {
                                    reject(data.error || 'Upload failed.');
                                }
                            })
                            .catch(error => reject(error));
                    });
                });
        }
    }

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = loader => {
            return new MyUploadAdapter(loader);
        };
    }
    document.addEventListener('DOMContentLoaded', () => {
        ClassicEditor
            .create(document.querySelector('#editor1'), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
            })
            .then(editor => {
                console.log('Editor is ready!', editor);
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });
    });

</script>
@endsection
