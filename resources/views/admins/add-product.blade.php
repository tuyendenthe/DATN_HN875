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

            <h4 class="page-title">Thêm mới sản phẩm</h4>

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
    <form action="{{ route('products.addPostProduct') }}" method="post" enctype="multipart/form-data">
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
            {{-- <div class="col-12 d-flex align-items-center">
                Là sản phảm thuộc tính
                <input class="ml-2" type="checkbox" name="is_attributes" value="1" id="isAttributesCheckbox">
            </div> --}}

            {{-- <div class="col-12 mt-2 d-none" id="parentProductDiv">
                Sản phẩm cha
                <select class="form-control" name="product_parent" id="parentProductSelect">
                    <option value="">Chọn cha sản phẩm</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-name="{{ $product->name }}" data-category="{{ $product->category_id }}" data-role="{{ $product->role }}">{{ $product->name }}</option>
                    @endforeach

                </select>
            </div> --}}

            <div class="col-12">
                Tên:
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name_product">
                @error('name')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                Danh mục:
                <select name="category_id" class="form-control" id="categorySelect">
                    @foreach ($data as $val)
                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="" style="color: red">{{ $message }}</span>
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
                Chip:
                <input type="text" name="chip" value="{{ old('chip') }}" class="form-control">
                @error('chip')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                Màu Sắc:
                <input type="text" name="color" value="{{ old('color') }}" class="form-control" onkeypress="return validateInput(event)">
                @error('color')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                Kích Thước Màn Hình:
                <input type="text" name="screen" value="{{ old('screen') }}" class="form-control">
                @error('screen')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror
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
                <textarea name="content" class="form-control" id="editor1" value="{{ old('content') }}" cols="152" rows="20"></textarea>
                @error('content')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                Loại Sản Phẩm:
                <select name="role" class="form-control" id="roleSelected">
                    <option value="1">Sản Phẩm Thường</option>
                    <option value="2">Sản Phẩm Nổi Bật</option>
                </select>
                @error('role')
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#isAttributesCheckbox').change(function() {
        if ($(this).is(':checked')) {
            $('#categorySelect').attr('disabled', true);
            $('#roleSelected').attr('disabled', true);


            $('#parentProductDiv').removeClass('d-none').addClass('d-block');
        } else {
            $('#categorySelect').attr('disabled', false);
            $('#roleSelected').attr('disabled', false);
            $('#parentProductDiv').removeClass('d-block').addClass('d-none');
        }
    });
    document.getElementById('parentProductSelect').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const dataAttributes = {};
        for (const attr of selectedOption.attributes) {
            if (attr.name.startsWith('data-')) {
                dataAttributes[attr.name] = attr.value;
            }
        }
        $('#name_product').val(dataAttributes['data-name']);


        const categorySelect = document.getElementById('categorySelect');
        const roleSelected = document.getElementById('roleSelected');

        categorySelect.value = dataAttributes['data-category'];
        roleSelected.value = dataAttributes['data-role'];
    });
</script>
<script>
    function validateInput(event) {
        const char = String.fromCharCode(event.which);
        // Kiểm tra xem ký tự có phải là chữ cái, dấu hoặc khoảng trắng hay không
        const regex = /^[\p{L}\s\p{P}]$/u;
        return regex.test(char);
    }
    </script>
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

    <script>
    // Tự động ẩn thông báo lỗi sau 5 giây
    document.addEventListener('DOMContentLoaded', function () {
        const globalError = document.getElementById('globalError');
        if (globalError) {
            setTimeout(() => {
                globalError.style.transition = 'opacity 0.5s ease';
                globalError.style.opacity = '0';
                setTimeout(() => {
                    globalError.remove();
                }, 500); // Chờ thêm 0.5 giây để hiệu ứng mờ hoàn thành
            }, 5000); // 5000ms = 5 giây
        }
    });
</script>


@endsection
