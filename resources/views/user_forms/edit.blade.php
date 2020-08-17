@extends('master')
@section('title','edit')
@section('main')
    <div class="col-xl-4 col-xl-offset-4 container">
        <center><h2>Sửa thông tin sinh viên</h2></center>
        <form action ="{{ route('users.update', $us['id']) }}" method="post"enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" class="form-control" id="" name="id" value="{{ $us['id'] }}"/>
            <div class="form-group">
                <label for="tensinhvien">Tên sinh viên</label>
                <input type="text" class="form-control" id="" name="name" value="{{ $us['name'] }}" placeholder="Tên sinh viên"/>
                @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" class="form-control" id="" name="address" value="{{ $us['address'] }}" placeholder="Địa chỉ"/>
                @if ($errors->has('address'))
                <div class="alert alert-danger">
                    {{ $errors->first('address') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="" name="email" value="{{ $us['email'] }}" placeholder="Email"/>
                @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="sodienthoai">Số điện thoại</label>
                <input type="text" class="form-control" id="" name="phone" value="{{ $us['phone'] }}" placeholder="Số điện thoại"/>
                @if ($errors->has('phone'))
                <div class="alert alert-danger">
                    {{ $errors->first('phone') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="upload_file_avatar" name="avatar" placeholder="Avatar"/><br>
                <img class="img-preview" src="{{ asset('./storage/avatar/'.$us['avatar']) }}" alt="" width="150px">
                @if ($errors->has('avatar'))
                <div class="alert alert-danger">
                    {{ $errors->first('avatar') }}
                </div>
                @endif
            </div>
            <center><button type="submit" class="btn btn-primary" name="btnEdit">Sửa</button></center>
        </form>
    </div>
@endsection
