@extends('admins.master')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100  p-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h1 class="mb-0">Danh mục sản phẩm</h1>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm danh mục sản phẩm</a>
                </div>
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Ghi Chú</th>
                            <th>UUID</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Categories as $Categorie)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $Categorie->name }}</td>
                                <td class="align-middle">{{ $Categorie->description }}</td>
                                <td class="align-middle">{{ $Categorie->uuid }}</td>
                                <td class="align-middle">{{ $Categorie->status_delete }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('categories.edit', $Categorie->uuid) }}" class="btn btn-info">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                    {{-- <a href="{{ route('categories.delete',$Categorie->uuid) }}" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a> --}}

                                    <button type="button" class="btn btn-danger" onclick="OnClickDelete('{{ $Categorie->uuid }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Product not found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-top" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Thông báo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">Bạn có muốn xóa danh mục sản phẩm này...?</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Đóng
                                </button>
                                <form action="{{  route('categories.delete') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="uuid_cate" id="uuid_cate">
                                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function OnClickDelete(id){
        $('#uuid_cate').val(id);
        $('#exampleModal').modal('show');
    }
</script>

@endsection