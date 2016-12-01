@include('spider::partials.customize.dropdown')
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="{{ asset('vendor/spider/alte/dist/img/'.auth()->user()->getProfile->images_profile) }}" class="user-image" alt="User Image">
    <span class="hidden-xs">
      <?php 
          $users = auth()->user()->getProfile->name;
          $jumlah = 1;
          $hasil = implode(' ', array_slice(explode(' ', $users), 0, $jumlah));
        ?>
      <i>{{ ucfirst($hasil) }}'s</i>
    </span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
      <img src="{{ asset('vendor/spider/alte/dist/img/'.auth()->user()->getProfile->images_profile) }}" class="img-circle" alt="User Image">
      <p>
        {{ ucwords(auth()->user()->getProfile->name) }}
        <small>Member since Nov. 2012</small>
      </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body">
      <div class="col-xs-4 text-center">
        <a href="#">Followers</a>
      </div>
      <div class="col-xs-4 text-center">
        <a href="#">Sales</a>
      </div>
      <div class="col-xs-4 text-center">
        <a href="#">Friends</a>
      </div>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="{{ URL(config('spider.route_prefix').'/my-profile/'.base64_encode(auth()->user()->id)) }}" class="btn btn-info btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="{{ url(config('spider.route_prefix').'/logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">Sign out</a>
           <form id="logout-form" action="{{ url(config('spider.route_prefix').'/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </div>
    </li>
  </ul>
</li>
