@extends('layout')
@section('content')
@if ( Session::has('success') )
<div class="alert alert-success alert-dismissible" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif
<div class="container">
    <div class="col-sm-2">
    
    </div>
    <div class="col-sm-8">
    <form class="form-horizontal" role="form" id="validateForm" method="POST" action="{{route('user.update', $user->id)}}">
        @method('put')
        @csrf
        <h2 class="suasanpham">Sửa user</h2>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Tài Khoản</label>
            <div class="col-sm-9">
                <input id="username" class="form-control error-border" name="username" type="text" autofocus value="{{$user->username}}" readonly>
                @error('username')
                <span class=" col-6 error-val">{{ $message  }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Mật Khẩu</label>
            <div class="col-sm-9">
                <input id="password" class="form-control error-border" name="password" type="password" autofocus value="{{$user->password}}" readonly>
                @error('password')
                <span class=" col-6 error-val">{{ $message  }}</span>
                @enderror
            </div>
            <a href="" style="float: right; margin: 12px 50px 0 0px ;">Đổi mật khẩu</a>
        </div>
        
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Tên Khách Hàng</label>
            <div class="col-sm-9">
                <input id="name" class="form-control error-border" name="name" type="text" autofocus value="{{$user->name}}">
                @error('name')
                <span class=" col-6 error-val">{{ $message  }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="lastName" class="col-sm-3 control-label">Giới Tính</label>
            <div class="col-sm-9">
                <select id="sex" class="form-control error-border" name="sex" type="text">
                    @foreach (App\User::GENDER as $gender)
                    <option value="{{App\User::GENDER_CODE[$gender]}}" @if(App\User::GENDER_CODE[$gender] == $user->sex) selected @endif>{{$gender}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Tuổi</label>
            <div class="col-sm-9">
                <input id="age" class="form-control error-border" name="age" type="text" value="{{$user->age}}">
                @error('age')
                <span class=" col-6 error-val">{{ $message  }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Số Điện Thoại</label>
            <div class="col-sm-9">
                <input id="phonenumber" class="form-control error-border" name="phonenumber" type="text" value="{{$user->phonenumber}}">
                @error('phonenumber')
                <span class=" col-6 error">{{ $message  }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input id="email" class="form-control error-border" name="email" type="text" value="{{$user->email}}" readonly>
                @error('email')
                <span class=" col-6 error-val">{{ $message  }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Địa Chỉ</label>
            <div class="col-sm-9">
                <input id="address" class="form-control error-border" name="address" type="text" value="{{$user->address}}">
            </div>
        </div>
        <div class="save">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 0px; ">   <a href="{{route('user.index')}}">Quay lại</a></button>
            
                </div>
                
       
    </form>
    </div>
    <div class="col-sm-2">
    
    </div>
    
</div>
@endsection
@section('script')
@endsection
<style>
img#preview {
    width: 157px;
    margin-left: 33%;
}
h2.suasanpham {
    font-size: 30px;
    font-weight: co;
    font-weight: 600;
    color: red;
    text-align: center;
    margin-bottom: 50px;
    margin-top: 50px;
}
.btn-block {
    width: 20% !important;
    float: left;
    margin-right: 45px;
}
.save{
 
    margin-left: 40%;
    margin-bottom: 100px;
color:black;
}
.save a{
    color: white;
}
</style>