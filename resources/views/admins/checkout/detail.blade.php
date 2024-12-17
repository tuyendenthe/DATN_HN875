@extends('admins.master')

@section('content')
    <style>
        * {
  margin: 0;
  padding: 0;
}

body {
  font-family: roboto;
  background: white;
}

.material-icons {
  cursor: pointer;
}

.invoice-container {
  margin: auto;
  padding: 0px 20px;
}

.invoice-header {
  display: flex;
  padding: 70px 0%;
  width: 100%;
}

.title {
  font-size: 18px;
  letter-spacing: 3px;
  color: rgb(66, 66, 66);
}

.date {
  padding: 5px 0px;
  font-size: 14px;
  letter-spacing: 3px;
  color: rgb(156, 156, 156);
}

.invoice-number {
  font-size: 17px;
  letter-spacing: 2px;
  color: rgb(156, 156, 156);
}

.space {
  width: 50%;
}

table {
  table-layout: auto;
  width: 100%;
}
table, th, td {
  border-collapse: collapse;
}

th {
  padding: 10px 0px;
  border-bottom: 1px solid rgb(187, 187, 187);
  border-bottom-style: dashed;
  font-weight: 400;
  font-size: 13px;
  letter-spacing: 2px;
  color: gray;
  text-align: left;

}

td {
  padding: 10px 0px;
  border-bottom: 0.5px solid rgb(226, 226, 226);
  text-align: left;
}

.dashed {
  border-bottom: 1px solid rgb(187, 187, 187);
  border-bottom-style: dashed;
}

.total {
  font-weight: 800;
  font-size: 20px !important;
  color: black;
}

input[type=number] {
  text-align: center ;
  max-width: 50px;
  font-size: 15px;
  padding: 10px;
  border: none;
  outline: none;
}

input[type=text] {
  max-width: 170px;
  text-align: left;
  font-size: 15px;
  padding: 10px;
  border: none;
  outline: none;
}

input[type=text]:focus {
  border-radius: 5px;
  background: #ffffff;
  box-shadow:  11px 11px 22px #d9d9d9,
           -11px -11px 22px #ffffff;
}

input[type=number]:focus {
  border-radius: 5px;
  background: #ffffff;
  box-shadow:  11px 11px 22px #d9d9d9,
           -11px -11px 22px #ffffff;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}
/* Firefox */
input[type=number] {
-moz-appearance: textfield;
}

.float{
  width:40px;
  height:40px;
  background-color:#FF1D89;
  color:#FFF;
  border-radius:100%;
  text-align:center;
  box-shadow:
0 2.8px 2.2px rgba(0, 0, 0, 0.048),
0 6.7px 5.3px rgba(0, 0, 0, 0.069),
0 12.5px 10px rgba(0, 0, 0, 0.085),
0 22.3px 17.9px rgba(0, 0, 0, 0.101),
0 41.8px 33.4px rgba(0, 0, 0, 0.122),
0 100px 80px rgba(0, 0, 0, 0.17);
}

.float:hover {
  background-color:#ff057e;
}

.plus{
  margin-top:10px;
}

#sum {
  text-align: right;
  width: 100%;
}

#sum input[type=text] {
  width: 100%;
  font-size: 33px !important;
  color: black;
  text-align: right !important;

}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  body {
      background: lemonchiffon;
  }
  .invoice-container {
      border: solid 1px gray;
      width: 60%;
      margin: 50px auto;
      padding: 40px;
      padding-bottom: 100px;
      border-radius: 5px;
      background: white;
      box-shadow:
0 2.8px 2.2px rgba(0, 0, 0, 0.02),
0 6.7px 5.3px rgba(0, 0, 0, 0.028),
0 12.5px 10px rgba(0, 0, 0, 0.035),
0 22.3px 17.9px rgba(0, 0, 0, 0.042),
0 41.8px 33.4px rgba(0, 0, 0, 0.05),
0 100px 80px rgba(0, 0, 0, 0.07);
  }

  .title-date {
      width: 20%;
  }
  .invoice-number {
      width: 20%;
  }
  .space {
      width: 80%;
  }
}
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400&display=swap" rel="stylesheet">


    {{-- <div class="invoice-container">
    </div> --}}


    <div class=" m-3" style="background-color: rgb(230, 230, 230);">
    <header>
        <h3 class="text-center">Chi Tiết Đơn Hàng</h3>
    </header>
    <main>
        <div class="border bg-light  m-3">
            <div class="m-3 border p-3">
            <h5>#1.Thông Tin Đơn Hàng</h5>
            <div class="my-2">
            <label for="">Mã Đơn Hàng</label> <br>
            <input type="text" name="code_bill" class="form-control" id="" value="{{ $data->bill_code }}" disabled>

             </div>
            <div class="my-2">
            <label for="">Trạng Thái</label> <br>
            <input type="text" name="code_bill" class="form-control" id="" value="  {{ $data->status_name }}" disabled>


                @if ($data->status==1)

                <form action="{{ route('bill.bill_cancel',$data->bill_code) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger"> Hủy Đơn Hàng</button>
                </form>
                @endif
             </div>
             <hr>
             <div class="my-2">
                <label for="">Tên Khách Hàng</label> <br>
                <input type="text" name="code_bill" id="" class="form-control" value="{{ $data->name }}" disabled>

                 </div>
             <div class="my-2">
                <label for="">Số Điện Thoại</label> <br>
                <input type="text" name="code_bill" id="" class="form-control" value="{{ $data->phone }}" disabled>

                 </div>
             <div class="my-2">
                <label for="">Địa Chỉ</label> <br>
                <input type="text" name="code_bill" id="" class="form-control" value="{{ $data->address }}" disabled>

                 </div>
             <div class="my-2">
                <label for="">Ngày Đặt Hàng</label> <br>
                <input type="datetime" name="code_bill" id="" class="form-control" value="{{ $data->created_at }}" disabled>

                 </div>

        </div>
        <div class="border   m-3" >
            <div class="m-3">
                <h5>#2.Thông Tin Sản Phẩm</h5>
                <table class="table my-2  " >
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên Sản Phẩm</td>
                            <td>Ảnh</td>
                            <td>Giá</td>
                            <td>Số Lượng</td>
                            <td>Thành Tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $key => $value)


                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td> <img  src="{{ asset($value->image) }}"  alt="" width="100px"></td>
                            <td>{{ number_format($value->price, 0, ',', '.') }} VNĐ</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ number_format($value->subtotal, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        @endforeach
                        <tr>

                            <td></td>
                            <td>Tổng Tiền</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($data->total, 0, ',', '.') }} VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </main>
</div>

  </div>




@endsection
