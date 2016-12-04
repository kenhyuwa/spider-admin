<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('vendor/upload/images/thumbnails/'.auth()->user()->getProfile->images_profile) }}" class="img-circle user-online" alt="User Image">
    </div>
    <div class="pull-left info">
      <?php 
          $users = auth()->user()->getProfile->name;
          $jumlah = 1;
          $hasil = implode(' ', array_slice(explode(' ', $users), 0, $jumlah));
        ?>
      <p class="user-name">{{ ucfirst($hasil) }}'s</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
      <a href="{{ URL(config('spider.route_prefix').'/dashboard') }}">
        <i class="fa fa-google-wallet"></i> <span> Dashboard</span>
      </a>
    </li>
    @include('spider::partials.customize.sidebar-menu')
    @if (auth()->user()->getProfile->roles != 'admin')
    @else
    <li class="header">SETTING</li>
    <li class="treeview">
      <a href="{{ URL(config('spider.route_prefix').'/users') }}">
        <i class="fa fa-users"></i> <span> Users</span>
      </a>
    </li>
    @endif
  </ul>
</section>
<!-- /.sidebar -->
