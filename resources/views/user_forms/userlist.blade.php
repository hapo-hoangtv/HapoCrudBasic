@extends('master')
@section('title','userlist')
@section('main')
@if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif         
    <center><h2>Danh sách sinh viên</h2></center>
    <table class="table table-striped" border="1">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sinh viên </th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Avatar</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($userlist as $value): $stt++ ?>
    <tr>
        <td>{{ $stt }}</td>
        <td>{{ $value['name'] }}</td>
        <td>{{ $value['address'] }}</td>
        <td>{{ $value['email'] }}</td>
        <td>{{ $value['phone'] }}</td>
        <td><img src="{{ asset($value['avatar']) }}" width="100px"></td>
        <td><a href="users/edit/{{ $value['id'] }}">Sửa</a></td>
        <td><a href="users/delete/{{ $value['id'] }}">Xóa</a></td>
    </tr>
    <?php endforeach ?>
    <tr><td colspan="7"><a href="users/create">Thêm sinh viên mới</a><td></tr>
    </tbody>
    </table> 
    {{ $userlist->links() }}
@endsection
