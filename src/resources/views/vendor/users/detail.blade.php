@extends('spider::layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> User</a></li>
    <li class="active">Detail User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- form start -->
<form method="POST" action="#" enctype="multipart/form-data" class="form-horizontal" id="myForm">
{{ csrf_field() }}
  <div class="row">
    <div class="col-md-8">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">User</h3>
            <div class="box-tools pull-right">
              <button type="button" onclick="updates()" id="update" class="btn btn-box-tool" data-toggle="tooltip" title="Update"><i class="fa fa-cog"></i></button>
              <button type="button" onclick="details()" id="detail" class="btn btn-box-tool" data-toggle="tooltip" title="Detail"><i class="fa fa-search-plus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div class="box-body">
            <div class="box-update">
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Employee Name" value="{{ $detail->name }}" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-3 control-label">Gender :</label>
                <div class="col-sm-9">
                @if($detail->gender == 'male')
                  <div class="radio">
                    <label for="l">
                      <input type="radio" name="gender" id="l" class="flat-red" value="male" checked>
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label for="p">
                      <input type="radio" name="gender" id="p" class="flat-red" value="female">
                      Female
                    </label>
                  </div>
                  @else
                  <div class="radio">
                    <label for="l">
                      <input type="radio" name="gender" id="l" class="flat-red" value="male">
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label for="p">
                      <input type="radio" name="gender" id="p" class="flat-red" value="female" checked>
                      Female
                    </label>
                  </div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Address :</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">{{ $detail->address }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="phone" name="phone" data-inputmask='"mask": "(9999) 99-999-999"' data-mask placeholder="Phone" value="{{ $detail->phone }}" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Roles :</label>
                <div class="col-sm-9">
                <?php
                  $status = [
                      "admin" =>"Admin", "user" =>"User"
                  ];
                ?>
                {!! Form::select('roles', $status, $detail->roles, ['id' => 'status', 'class' => 'form-control']) !!}
                </div>
              </div>
            </div>
            {{-- detail --}}
            <div class="box-detail">
              <div class="form-group">
                <label for="employee_name" class="col-sm-3 control-label">Name :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="name_detail" value="{{ ucwords($detail->name) }}" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-3 control-label">Gender :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa @if($detail->gender == 'male') fa-mars @else fa-venus @endif"></i></span>
                    <input type="text" id="gender_detail" class="form-control" value="@if($detail->gender == 'male') Male @else Female @endif" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="nik" class="col-sm-3 control-label">Address :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" id="address_detail" class="form-control" value="{{ ucwords($detail->address) }}" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-tty"></i></span>
                    <input type="text" id="phone_detail" class="form-control" value="{{ $detail->phone }}" disabled="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Roles :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="text" id="roles_detail" class="form-control" value="{{ ucwords($detail->roles) }}" disabled="true">
                  </div>
                </div>
              </div>
            </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    {{-- images --}}
    <div class="col-md-4">
      <!-- Horizontal Form -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Images</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
          <div class="box-body" style="padding-bottom: 22px;">
          <div class="box-update">
            <div class="form-group">
              <label for="user_img" class="col-sm-12 control-label">User Images :</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="user_img" name="user_img">
              </div>
            </div>
            <div class="form-group">
              <label for="showgambar" class="col-sm-12 control-label">Images Preview :</label>
              <div class="col-sm-12">
                <img src="{{ asset('vendor/upload/images/thumbnails/'.$detail->images_profile) }}" alt="..." id="showgambar" class="margin" style="max-width: 150px;max-height: 100px;width: 100%;height: 100%;">
              </div>
            </div>
            </div>
            {{-- detail --}}
          <div class="box-detail">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url({{ asset('vendor/upload/images/thumbnails/'.$detail->images_profile) }}) center center; height: 235px;background-size: cover;">
                </div>
                <div class="widget-user-image" style="top: 190px;">
                  <img class="img-circle" id="img_detail" src="{{ asset('vendor/upload/images/thumbnails/'.$detail->images_profile) }}" alt="User Avatar">
                </div>
                  <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-12 border-right">
                      <div class="description-block" style="margin-top: 20px;">
                        <h3 class="widget-user-username">{{ ucwords($detail->name) }}</h3>
                        <h5 class="widget-user-desc">({{ ucwords($detail->roles) }})</h5>
                        <h5 class="description-header">{{ $detail->phone }}</h5>
                        <span class="description">{{ $detail->getUser->email }}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.widget-user -->
          </div>
          </div>
          <div class="box-update">
            <div class="box-footer">
              <button type="button" onclick="save()" id="btn-save" class="btn btn-info pull-right">Save</button>
              <button type="button" onclick="details()" class="btn btn-default pull-right" style="margin-right: 10px;">Cancel</button>
            </div><!-- /.box-footer -->
          </div>
      </div><!-- /.box -->
    </div>
  </div>
</form>

</section><!-- /.content -->
@endsection

@section('script')
<script>

// ucwords JS
  String.prototype.toUpperCaseWords = function () {
    return this.replace(/\w+/g, function(a){ 
      return a.charAt(0).toUpperCase() + a.slice(1).toLowerCase()
    })
  }

   //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  details();

  $("[data-mask]").inputmask();
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

  $("#user_img").change(function () {
      readURL(this);
  });

  function updates() {
    $('#update').hide();
    $('#detail').show();
    $('.box-update').show();
    $('.box-update').show();
    $('.box-detail').hide();
  }

  function details() {
    $('#detail').hide();
    $('#update').show();
    $('.box-update').hide();
    $('.box-update').hide();
    $('.box-detail').show();
  }

  function refresh(id,authID,profile_id)
  {
    // var profile_id = id;
    // var authID = authID;
    $.ajax({
      type: 'GET',
      url:"{{ URL(config('spider.config.route_prefix').'/users/') }}/"+id,
      success: function(data) {
        if(profile_id == authID) {
          $('.user-online').attr('src', "{{ asset('vendor/upload/images/thumbnails') }}/"+data.images_profile);
          $('.user-name').html(data.name.toUpperCaseWords());
        }
        $('#name_detail').val(data.name.toUpperCaseWords());
        $('#gender_detail').val(data.gender.toUpperCaseWords());
        $('#address_detail').val(data.address.toUpperCaseWords());
        $('#phone_detail').val(data.phone);
        $('#roles_detail').val(data.roles.toUpperCaseWords());
        $('#img_detail').attr('src', "{{ asset('vendor/upload/images/thumbnails') }}/"+data.images_profile);
        $('.bg-black').attr('style',"background: url({{ asset('vendor/upload/images/thumbnails/') }}/"+data.images_profile+") center center; height: 235px;background-size: cover;");
      }
    });
  }

  function save()
  {
    $('#btn-save').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
    var route = '{{ URL(config('spider.config.route_prefix').'/users/'.base64_encode($detail->id)) }}';
    var formData = new FormData($("#myForm")[0]);
    var id = "{{ base64_encode($detail->id) }}";
    var authID = "{{ auth()->user()->getProfile->id }}";
    var profile_id = "{{ $detail->id }}";
    $.ajax({
      type:'POST',
      url: route,
      processData: false,
      contentType: false,
      data: formData,
      success:function(data) {
        if(data.success == 'true') {
          $('#myForm')[0].reset();
          $('#btn-save').html('Save');
          swal({
            type: 'success',
            title: 'Good Job !',
            text: '',
            showConfirmButton: false,
            timer:2000
          });
          details();
          refresh(id,authID,profile_id);
        }else{
          $('#btn-save').html('Save');swal({
            type: 'error',
            title: 'Opps !',
            text: 'Something when wrong.',
            showConfirmButton: false,
            timer:2000
          });
        }
      }
    })
  }
</script>
@stop
