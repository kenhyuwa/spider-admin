<table id="users-table" class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th width="10px">No</th>
      <th>Nama</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Username</th>
      <th>Roles</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no =1; ?>
    @foreach ($users as $user)
    <tr data-id="{{ $user->id }}">
      <td>{{ $no++ }}</td>
      <td>{{ ucwords($user->name) }}</td>
      <td>{{ ucwords($user->gender) }}</td>
      <td>{{ ucwords($user->address) }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->getUser->name }}</td>
      <td>
        <center>
          @if($user->roles == 'admin')
          <label class="label label-success"><i class="fa fa-circle"></i> Admin</label>
          @else
          <span class="label label-success"><i class="fa fa-check-circle"></i> User</span>
          @endif
        </center>
      </td>
      <td>
        <center>
          <a href="{{ URL(config('spider.config.route_prefix').'/users/'.base64_encode($user->id).'/detail') }}" class="btn btn-xs btn-flat btn-info"><i class="fa fa-eye"></i></a>
          <a type="button" onclick="deletes('{{ base64_encode($user->id) }}')" class="btn btn-xs btn-flat btn-danger"><i class="fa fa-trash-o"></i></a>
        </center>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>