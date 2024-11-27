@extends('admins.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Chuyển trạng thái đơn hàng</h5>
        <div class="form-group row">
            <label class="col-md-3 m-t-15">Trạng thái đơn hàng </label>
            <div class="col-md-9">

                @php
                     $id = $data->id;
                @endphp
                <form  action="{{ route('checkout.updatestatus', $id) }}" method="POST">
                    @csrf
                    <select name="status_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">

                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary form-control mt-3">Xác Nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
