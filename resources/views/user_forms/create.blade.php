@extends('master')
@section('title','create')
@section('main')
<div class="col-xl-4 col-xl-offset-4 container">
    <center><h2>Thêm sinh viên</h2></center>
    <form action ="{{ route('users.store') }}" method="post" enctype="multipart/form-data" id="">
    @csrf 
    <div class="form-group">
        <label for="tensinhvien">Tên sinh viên</label>
        <input type="text" class="form-control" id="" name="name" placeholder="Tên sinh viên"/>
        @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="" name="address" placeholder="Địa chỉ"/>
        @if ($errors->has('address'))
        <div class="alert alert-danger">
            {{ $errors->first('address') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email"/>
        @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="sodienthoai">Số điện thoại</label>
        <input type="text" class="form-control" id="" name="phone" placeholder="Số điện thoại"/>
        @if ($errors->has('phone'))
        <div class="alert alert-danger">
            {{ $errors->first('phone') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" id="" name="avatar" placeholder="Avatar" />
        @if ($errors->has('avatar'))
        <div class="alert alert-danger">
            {{ $errors->first('avatar') }}
        </div>
        @endif
    </div>
    <center><button type="submit" class="btn btn-primary" name="btnAdd">Thêm</button></center>
</form>
</div>
@endsection
