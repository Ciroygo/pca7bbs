@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
  <div class="row">
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
      <div class="card">
        <img class="card-img-top" src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/600/h/600" alt="{{ $user->name }}"></img>
        <div class="card-body">
          h5>strong
        </div>
      </div>
    </div>
  </div>
@stop
