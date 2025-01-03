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
                <div class="col-12 d-flex align-items-center">
                    Là sản phảm thuộc tính
                    <input class="ml-2" type="checkbox" name="is_attributes" value="1" id="isAttributesCheckbox" {{ $product->is_attributes == 1 ? 'checked' : '' }}>
                </div>

                <div class="col-12 mt-2 {{ $product->is_attributes == 1 ? ' d-block' : 'd-none' }}" id="parentProductDiv">
                    Sản phẩm cha
                    <select class="form-control" name="product_parent" id="parentProductSelect">
                        <option value="">Chọn cha sản phẩm</option>
                        @foreach ($products as $product1)
                            <option value="{{ $product1->id }}" data-name="{{ $product1->name }}"
                            data-category="{{ $product1->category_id }}" data-role ="{{ $product1->role }}"
                            {{ $product->product_parent == $product1->id ? ' selected="selected"' : '' }}
                            >{{ $product1->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-12">
                    Tên:
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                    {{-- @error('name')
                    <span class="" style="color: red">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div class="col-12">
                    Số Lượng:
                    <input type="text" name="quantity" value="{{ $product->quantity  }}" class="form-control">
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
                    <select name="category_id" value="{{ $product->category_id }}"

                        class="form-control" id="categorySelect" {{ $product->is_attributes == 1 ? 'disabled' : '' }}>
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
                {{-- @error('ram')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
                <select name="ram_id" value="{{ $product->ram_id }}"

                        class="form-control" id="ramSelect" {{ $product->is_attributes == 1 ? 'disabled' : '' }}>
                    @foreach ($rams as $val)
                        <option value="{{ $val->id }}" {{ $product->ram_id == $val->id ? 'selected' : '' }}>
                            {{ $val->name }}
                        </option>
                    @endforeach
                </select>



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
                {{-- @error('memory')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
                <select name="memory_id" value="{{ $product->memory_id }}"

                        class="form-control" id="ramSelect" {{ $product->is_attributes == 1 ? 'disabled' : '' }}>
                    @foreach ($memories as $val)
                        <option value="{{ $val->id }}" {{ $product->memory_id == $val->id ? 'selected' : '' }}>
                            {{ $val->name }}
                        </option>
                    @endforeach
                </select>
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
                <textarea name="content" class="form-control" id="editor1" value="{{$product->content }}" cols="152" rows="20">{{$product->content }}</textarea>
                {{-- @error('content')
                <span class="" style="color: red">{{ $message }}</span>
                @enderror --}}
            </div>
            <div class="col-12">

                Loại Sản Phẩm:
                {{-- <label for="trang_thai">Trạng thái</label> --}}
                <select name="role" class="form-control" id="roleSelected" {{ $product->is_attributes == 1 ? 'disabled' : '' }}>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#isAttributesCheckbox').change(function () {
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
    document.getElementById('parentProductSelect').addEventListener('change', function () {
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
