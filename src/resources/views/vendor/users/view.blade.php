@extends('spider::layouts.apps')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> User</a></li>
    <li class="active">List User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
      <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">User</h3>
            <div class="box-tools pull-right">
              <a href="{{ URL(config('spider.route_prefix').'/users/create') }}" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-edit"></i> Add User</a>
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
            <div id="list" class="box-body">
              
            </div><!-- /.box-body -->
          <div class="box-footer">
            {{-- Footer --}}
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>

</section><!-- /.content -->
@endsection

@section('script')
<script>
    function listUser()
    {
      var url = APP_URL+'/{{ config('spider.route_prefix') }}/user';

      $.ajax({
        type:"GET",
        cache:false,
        url:url,
        success: function(data){
          $('#list').html(data);
          $('#users-table').DataTable();
        }
      });
    }

    listUser();

  function deletes(id)
  {
      var id = id;
      var PATH = APP_URL+'/{{ config('spider.route_prefix') }}/users/'+id+'/delete';

      swal({   
        title: "Apakah Anda yakin?",   
        text: "Tetap menghapus data ini !",   
        type: "warning",
        html: true,   
        showCancelButton: true,   
        // confirmButtonColor: "#DD6B55",   
        confirmButtonColor: "#3edc81",
        confirmButtonText: "Delete",    
        cancelButtonText: "Cancel",   
        closeOnConfirm: false,   
        closeOnCancel: false 
        }, 
        function(isConfirm){   
          if (isConfirm) { 
              $.ajax({
                type:"post",
                url :PATH,
                data : { id:id },
                    beforeSend:function(xhr){
                      var token = $('meta[name="csrf-token"]').attr('content');

                      if(token){
                        return xhr.setRequestHeader('X-CSRF-TOKEN',token);
                      }
                    },
                success : function(data){
                  if(data.success == 'true'){
                    listUser();
                  }
                  if(data.success == 'false'){
                    swal("Gagal!", "... ", "error");
                  }
                }
              });   
          swal("Berhasil!", "... ", "success");   
        } else {     
          swal("Dibatalkan!", "... ", "error");   
        } 
      });
  }
</script>
@stop
