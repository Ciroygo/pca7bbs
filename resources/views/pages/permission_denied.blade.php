@extends('layouts.app')

@section('title', '无权限访问')

@section('content')
<div class="col-md-4 offset-md-4">
  <div class="card">
    <div class="card-body">
      @if (Auth::check())
        <div class="alert alert-danger text-center mb-0">
          当前账号无权限访问后台
        </div>
      @else
        <div class="alert alert-danger text-center">
          请登录以后在操作
        </div>
        <a href="{{ route('login') }}" class="btn btn-lg btn-primary btn-block">
          <i class="fas fa-sign-in-alt"></i>
          登录
        </a>
      @endif
    </div>
  </div>
</div>
@stop
