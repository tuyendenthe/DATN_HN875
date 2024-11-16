@extends('admins.master')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Star</th>
                <th>User</th>
                <th>Product</th>
                <th>Duyet</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->star }}</td>
                    <td>{{ $comment->user?->name }}</td>
                    <td>{{ $comment->product->name }}</td>
                    <td>
                        <input type="checkbox" class="status-checkbox" data-comment-id="{{ $comment->id }}" {{ $comment->status == 1 ? 'checked' : '' }}>

                    </td>
                    <td>
                        <form action="{{ route('delete-comment', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
<script>
    $(document).on('change', '.status-checkbox', function() {
        var commentId = $(this).data('comment-id');
        var status = $(this).is(':checked') ? 1 : 0; // lấy trạng thái của checkbox
        
        $.ajax({
            url: "{{ route('update-status') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                commentId: commentId,
                status: status,
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>
@endsection
