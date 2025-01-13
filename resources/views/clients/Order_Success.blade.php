@extends('clients.master')

@section('content')
<style>
    main {
      text-align: center;
      padding: 40px 0;
      background: #EBF0F5;
    }
      h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
      }
      p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
      }
    .checkmark {
      color: #9ABC66;
      font-size: 100px;
      line-height: 200px;
      margin-left:-15px;
    }
    .card {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      display: inline-block;
      margin: 0 auto;
    }
  </style>
<div class="card mt-5 mb-5">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark">✓</i>
    </div>
      <h1>Đặt Hàng Thành công</h1>
      <p>Cảm Ơn Bạn Đã Tin Tưởng<br/> Đơn Hàng Sẽ Được Giao Trong Thời Gian Sớm Nhất. </p>
      <p>Thông Tin Đơn Hàng Đã Được Giửi Qua Email Của Bạn. </p>


      <a class="os-btn os-btn-danger mt-3" href="http://127.0.0.1:8000/">Tiếp Tục Mua Sắm</a>

    </div>
@endsection
