@extends('spider::layouts.apps')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>

    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-google-wallet"></i> Dashboard</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url({{ asset('vendor/spider/alte/dist/img/photo1.png') }}) center center;">
          <h3 class="widget-user-username">Spider <i>-AdminLTE</i></h3>
          <h6 class="widget-user-desc">Welcome to Administrator System Spider-AdminLTE.</h6>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{ asset('vendor/spider/alte/dist/img/user2-160x160.jpg') }}" alt="User Avatar">
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">3,200</h5>
                <span class="description-text"><a href="#">PRODUCTS</a></span>
              </div><!-- /.description-block -->
            </div><!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">13,000</h5>
                <span class="description-text"><a href="#">CATEGORYS</a></span>
              </div><!-- /.description-block -->
            </div><!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">35</h5>
                <span class="description-text"><a href="#">BRANDS</a></span>
              </div><!-- /.description-block -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">3,200</h5>
                <span class="description-text"><a href="#">SERIES</a></span>
              </div><!-- /.description-block -->
            </div><!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">13,000</h5>
                <span class="description-text"><a href="">EMPLOYEES</a></span>
              </div><!-- /.description-block -->
            </div><!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">13,000</h5>
                <span class="description-text"><a href="#">TRANSACTIONS</a></span>
              </div><!-- /.description-block -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
      </div><!-- /.widget-user -->
    </div><!-- /.col -->
</div>

</section><!-- /.content -->
@endsection

@section('script')
<script>
	@if(Session::has('success'))
    swal({
      type: "success",
      text: "Spider-AdminLTE have been installed.",
      title: "Congratulations !!!"
    });
  @endif
</script>
@stop
