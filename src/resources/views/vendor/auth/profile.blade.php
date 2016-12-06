@extends('spider::layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Profile</a></li>
    <li class="active">My Profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- form start -->
<form method="POST" action="{{ URL(config('spider.config.route_prefix').'/my-profile/'.base64_encode($account->id)) }}" class="form-horizontal" id="form">
{{ csrf_field() }}
  <div class="row">
    <div class="col-md-8">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">My Profile</h3>
            <div class="box-tools pull-right">
               <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div class="box-body">
              <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Username :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users text-blue"></i></span>
                    <input type="text" id="username" class="form-control" value="{{ $account->name }}" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">E-mail :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope text-blue"></i></span>
                    <input type="text" id="email" name="email" class="form-control" value="{{ $account->email }}" readonly="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="new-username" class="col-sm-3 control-label">New Username :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users text-red"></i></span>
                    <input type="text" class="form-control" id="new-username" name="newusername" placeholder="New Username" autocomplete="off" readonly="true">
                  </div>
                  <span><small class="text-blue">*Kosongkang jika tidak diubah.</small></span><br/>
                  @if($errors->has('newusername'))<small><i>* {!!$errors->first('newusername')!!}</i></small>@endif
                </div>
              </div>
              <div class="form-group">
                <label for="oldpassword" class="col-sm-3 control-label">Old Password :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key text-green"></i></span>
                    <input type="password" class="form-control" id="oldpassword" name="pass_lama" placeholder="Last Password" autocomplete="off" readonly="true">
                  </div>
                  <label for="passwordest" style="cursor: pointer;">
                    <input type="checkbox" id="passwordest">&nbsp;
                    <span id="hidest" onclick="hidest()"></span>
                    <span id="showest" onclick="showest()"></span>
                  </label><br/>&nbsp;&nbsp;<span><small class="text-blue">*Tampilkan.</small></span><br/>
                  @if($errors->has('pass_lama'))<small><i>* {!!$errors->first('pass_lama')!!}</i></small>@endif
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key text-green"></i></span>
                    <input type="password" class="form-control" id="password" name="pass_baru" value="{{ old('pass_baru') }}" placeholder="Password" autocomplete="off" readonly="true">
                  </div>
                  <label for="passwords" style="cursor: pointer;">
                    <input type="checkbox" id="passwords">&nbsp;
                    <span id="hide-password" onclick="hide()"></span>
                    <span id="show-password" onclick="show()"></span>
                  </label><br/>&nbsp;&nbsp;<span><small class="text-blue">*Tampilkan.</small></span><br/>
                  @if($errors->has('pass_baru'))<small><i>* {!!$errors->first('pass_baru')!!}</i></small>@endif
                </div>
              </div>
              <div class="form-group">
                <label for="repassword" class="col-sm-3 control-label">Retype Password :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key text-green"></i></span>
                    <input type="password" class="form-control" id="repassword" name="confirm_pass" value="{{ old('confirm_pass') }}" placeholder="Retype Password" autocomplete="off" readonly="true">
                  </div>
                  <label for="retypepassword" style="cursor: pointer;">
                    <input type="checkbox" id="retypepassword">&nbsp;
                    <span id="hide-repassword" onclick="hides()"></span>
                    <span id="show-repassword" onclick="shows()"></span>
                  </label><br/>&nbsp;&nbsp;<span><small class="text-blue">*Tampilkan.</small></span><br/>
                  @if($errors->has('confirm_pass'))<small><i>* {!!$errors->first('confirm_pass')!!}</i></small>@endif
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="button" onclick="validasi()" id="btn-save" class="btn btn-info pull-right">Save</button>
              <button type="reset" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</button>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    {{-- images --}}
    <div class="col-md-4">
      <!-- Horizontal Form -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">My Profile</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
          <div class="box-body">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url({{ asset('vendor/upload/images/thumbnails/'.$account->getProfile->images_profile) }}) center center; height: 230px;background-size: cover;">
                </div>
                <div class="widget-user-image" style="top: 180px;">
                  <img class="img-circle" src="{{ asset('vendor/upload/images/thumbnails/'.$account->getProfile->images_profile) }}" alt="User Avatar">
                </div>
                  <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-12 border-right">
                      <div class="description-block">
                        <h3 class="widget-user-username">{{ ucwords($account->getProfile->name) }}</h3>
                        <h5 class="widget-user-desc">({{ ucwords($account->getProfile->roles) }})</h5>
                        <h5 class="description-header">{{ $account->getProfile->phone }}</h5>
                        <span class="description">{{ $account->email }}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
            </div><!-- /.widget-user -->
          </div>
      </div><!-- /.box -->
    </div>
  </div>
</form>

</section><!-- /.content -->
@endsection

@section('script')
<script>

  $('#email').click(function() {
    $(this).attr('readonly', false);
    $('#new-username').attr('readonly', true);
    $('#oldpassword').attr('readonly', true);
    $('#password').attr('readonly', true);
    $('#repassword').attr('readonly', true);
  });

  $('#new-username').click(function() {
    $(this).attr('readonly', false);
    $('#email').attr('readonly', true);
    $('#oldpassword').attr('readonly', true);
    $('#password').attr('readonly', true);
    $('#repassword').attr('readonly', true);
  });

  $('#oldpassword').click(function() {
    $(this).attr('readonly', false);
    $('#email').attr('readonly', true);
    $('#new-username').attr('readonly', true);
    $('#password').attr('readonly', true);
    $('#repassword').attr('readonly', true);
  });

  $('#password').click(function() {
    $(this).attr('readonly', false);
    $('#email').attr('readonly', true);
    $('#new-username').attr('readonly', true);
    $('#oldpassword').attr('readonly', true);
    $('#repassword').attr('readonly', true);
  });

  $('#repassword').click(function() {
    $(this).attr('readonly', false);
    $('#email').attr('readonly', true);
    $('#new-username').attr('readonly', true);
    $('#oldpassword').attr('readonly', true);
    $('#password').attr('readonly', true);
  });

  $('#email,#new-username,#oldpassword,#password,#repassword').mouseenter(function() {
    $(this).css('cursor','text');
  });

  $('#passwordest').click(function(){
    $('#oldpassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });

  $('#passwords').click(function(){
    $('#password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });

  $('#retypepassword').click(function(){
    $('#repassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });

  function hide()
  {
    $('#show-password').show();
    $('#hide-password').hide();
    $('#show-password').html('Show');
  }

  function show()
  {
    $('#show-password').hide();
    $('#hide-password').show();
    $('#hide-password').html('Hidden');
  }

  hide();

  function hides()
  {
    $('#show-repassword').show();
    $('#hide-repassword').hide();
    $('#show-repassword').html('Show');
  }

  function shows()
  {
    $('#show-repassword').hide();
    $('#hide-repassword').show();
    $('#hide-repassword').html('Hidden');
  }

  hides();

  function hidest()
  {
    $('#showest').show();
    $('#hidest').hide();
    $('#showest').html('Show');
  }

  function showest()
  {
    $('#showest').hide();
    $('#hidest').show();
    $('#hidest').html('Hidden');
  }

  hidest();

  function validasi()
  {
      $('#btn-save').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
      $('#btn-save').attr('disabled',true);
      $('#email,#new-username,#oldpassword,#password,#repassword').attr('readonly', true);

      var url = $('#form').attr('action');
      var formData = $('#form').serialize();
      var passLama = $('#oldpassword').val();
      var passBaru = $('#password').val();
      var confirmPass = $('#repassword').val();

    if(passLama == '') {
      swal({
        title: 'Ma\'af !!!',
        text: 'Masukan Password lama.',
        showConfirmButton:false,
        type:'error',
        timer: 1000
      });
      $('#btn-save').html('Save');
      $('#btn-save').attr('disabled',false);
      return false;
    }

    if(passBaru == '') {
      swal({
        title: 'Ma\'af !!!',
        text: 'Masukan Password baru.',
        showConfirmButton:false,
        type:'error',
        timer: 1000
      });
      $('#btn-save').html('Save');
      $('#btn-save').attr('disabled',false);
      return false;
    }

    if(confirmPass == '') {
      swal({
        title: 'Ma\'af !!!',
        text: 'Masukan konfirmasi Password.',
        showConfirmButton:false,
        type:'error',
        timer: 1000
      });
      $('#btn-save').html('Save');
      $('#btn-save').attr('disabled',false);
      return false;
    }

    if(passBaru != confirmPass) {
      swal({
        title: 'Ma\'af !!!',
        text: 'Password baru & Konfirmasi Password harus sama.',
        showConfirmButton:false,
        type:'error',
        timer: 1000
      });
      $('#btn-save').html('Save');
      $('#btn-save').attr('disabled',false);
      return false;
    }

    $.ajax({
        type:"POST",
        datatype:"JSON",
        url:url,
        data:formData,
        success:function(data){
          if(data.simpan == 'true'){
            $('#form')[0].reset();
            $('#btn-save').html('Save');
            $('#btn-save').attr('disabled',false);
            $('#username').val(data.user);
            $('#email').val(data.email);
            $('.description').html(data.email);
            swal({
              title: 'Success !!!',
              text: 'Username dan Password Anda berhasil diubah.',
              showConfirmButton:false,
              type:'success',
              timer: 1000
            });
          }
          else if(data.simpan == 'trues'){
            $('#form')[0].reset();
            $('#btn-save').html('Save');
            $('#btn-save').attr('disabled',false);
            $('#email').val(data.email);
            $('.description').html(data.email);
            swal({
              title: 'Success !!!',
              text: 'Password Anda berhasil diubah.',
              showConfirmButton:false,
              type:'success',
              timer: 1000
            });
          }
          else{
            // $('#form')[0].reset();
            $('#btn-save').html('Save');
            $('#btn-save').attr('disabled',false);
            swal({
              title: 'Ma\'af !!!',
              text: data.pass_lama,
              showConfirmButton:true,
              type:'error'
            });
          }
        }
    });
  }
</script>
@stop
