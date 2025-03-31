@extends('admins.master')

@section('content')
{{--    <h2>Edit Post</h2>--}}

{{--    <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <div class="mb-3">--}}
{{--            <label for="title" class="form-label">Title</label>--}}
{{--            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="content_short" class="form-label">Short Content</label>--}}
{{--            <textarea class="form-control" id="content_short" name="content_short" required>{{ old('content_short', $post->content_short) }}</textarea>--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="content" class="form-label">Content</label>--}}
{{--            <textarea class="form-control" id="content" name="content" required>{{ old('content', $post->content) }}</textarea>--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="image" class="form-label">Image</label>--}}
{{--            <input type="file" class="form-control" id="image" name="image">--}}
{{--            @if ($post->image)--}}
{{--                <div class="mt-2">--}}
{{--                    <img src="{{ asset('storage/' . $post->image) }}" width="100" alt="Current Image">--}}
{{--                    <p>Current Image</p>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--            <label for="category_post_id" class="form-label">Category_post</label>--}}
{{--            <select class="form-control" id="category_post_id" name="category_post_id" required>--}}
{{--                @foreach ($categories as $category)--}}
{{--                    <option value="{{ $category->id }}" {{ $post->category_post_id == $category->id ? 'selected' : '' }}>--}}
{{--                        {{ $category->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        <button type="submit" class="btn btn-primary">Update Post</button>--}}
{{--        <a href="{{ route('post.index') }}" class="btn btn-secondary">Cancel</a>--}}
{{--    </form>--}}

{{--    @if (session('update_success'))--}}
{{--        <div class="alert alert-success mt-3">--}}
{{--            {{ session('update_success') }}--}}
{{--        </div>--}}
{{--    @endif--}}
<div class="cr-page-title cr-page-title-2">
    <div class="cr-breadcrumb">
        <h5>Sửa bài viết</h5>
    </div>
</div>
<div class="row">
    <form class="col-md-12" action="{{route('post.update', $post -> id)}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')

        <div class="cr-card card-default">
            <div class="cr-card-content">
                <div class="row cr-product-uploads">
                    <div class="col-lg-4 mb-991">
                        <div class="cr-vendor-img-upload">
                            <div class="cr-vendor-main-img">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="" class="cr-image-upload"
                                               name="image">
                                        <label><i class="ri-pencil-line"></i></label>
                                    </div>
                                    <div class="avatar-preview cr-preview">
                                        <div class="imagePreview cr-div-preview">
                                            <img class="cr-image-preview" width="500px" height="500px"
                                                 src="{{asset('storage/' . $post->image)}}"
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
                            <form class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" id="titlePost" class="form-control slug-title" value="{{ $post -> title }}" name="title">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Bài viết ngắn</label>
                                    <div style="padding-left: 0px" class="col-12">
                                        <input id="slugPost" value="{{ $post -> content_short }}" name="content_short" class="form-control here set-slug" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Danh mục</label>
                                    <select class="form-control" name="category_post_id">
                                        @foreach($categories as $category)
                                        <option class="form-control" value="{{ $category -> id }}" <?= $category->id == $post->category_post_id ? "selected" : '' ?>>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Nội dung bài viết</label>
                                    <textarea name="content"  id="editor1" cols="80" rows="70">{{ $post -> content }}</textarea>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
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
