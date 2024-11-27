@extends('admins.master')

@section('content')
{{--    <h2>Add New Post</h2>--}}

{{--    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        <div class="mb-3">--}}
{{--            <label for="title" class="form-label">Title</label>--}}
{{--            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>--}}
{{--            @error('title')--}}
{{--                <div class="invalid-feedback">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="content_short" class="form-label">Short Content</label>--}}
{{--            <textarea class="form-control @error('content_short') is-invalid @enderror" id="content_short" name="content_short" required></textarea>--}}
{{--            @error('content_short')--}}
{{--                <div class="invalid-feedback">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="content" class="form-label">Content</label>--}}
{{--            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required></textarea>--}}
{{--            @error('content')--}}
{{--                <div class="invalid-feedback">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="image" class="form-label">Image</label>--}}
{{--            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">--}}
{{--            @error('image')--}}
{{--                <div class="invalid-feedback">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="category_post_id" class="form-label">Category_post</label>--}}
{{--            <select class="form-control @error('category_post_id') is-invalid @enderror" id="category_post_id" name="category_post_id" required>--}}
{{--                <option value="">Select Category</option>--}}
{{--                @foreach ($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            @error('category_post_id')--}}
{{--                <div class="invalid-feedback">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <button type="submit" class="btn btn-primary">Add Post</button>--}}
{{--        <a href="{{ route('post.index') }}" class="btn btn-secondary">Cancel</a>--}}
{{--    </form>--}}
<div class="cr-page-title cr-page-title-2">
    <div class="cr-breadcrumb">
        <h5>Tạo bài viết</h5>
    </div>
</div>
<div class="row">
    <form class="col-md-12" action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="cr-card card-default">
            <div class="cr-card-content">
                <div class="row cr-product-uploads">
                    <div class="col-lg-4 mb-991">
                        <div class="cr-vendor-img-upload">
                            <div class="cr-vendor-main-img">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" id="image" class="cr-image-upload"
                                               name="image">
                                        <label><i class="ri-pencil-line"></i></label>
                                    </div>
                                    <div class="avatar-preview cr-preview">
                                        <div class="imagePreview cr-div-preview">
                                            <img class="cr-image-preview"
                                                 src="{{asset('admin/assets/images/preview.jpg')}}"
                                                 alt="edit">
                                        </div>
                                    </div>
                                </div>
                                <div class="thumb-upload-set colo-md-12">
                                    <div class="thumb-upload"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="cr-vendor-upload-detail">
                                <div class="col-md-12">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" id="titlePost" class="form-control slug-title" name="title">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Content Short</label>
                                    <div style="padding-left: 0px" class="col-12">
                                        <input id="slugPost" name="content_short" class="form-control here set-slug" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" name="category_post_id">
                                        @foreach($categories as $category)
                                        <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Nội dung bài viết</label>
                                    <textarea name="content" id="editor1" cols="80" rows="70"></textarea>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Tạo bài viết</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
