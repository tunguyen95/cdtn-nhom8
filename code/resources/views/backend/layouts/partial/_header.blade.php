 <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ url('images/avatar', Auth::user()->avatar) }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                        @if (Auth::check()) 
                            {{ Auth::user()->name }}
                        @endif
                  </span>
                </a>
                <ul class="dropdown-menu">
                <li class="user-body">
                   <div class="pull-left">
                     @if (Auth::check()) 
                       <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-default btn-flat">Cập nhật thông tin</a>
                     @endif
                   </div>
                   <div class="pull-right">
                     @if (Auth::check()) 
                       <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                     @endif
                   </div>
                </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Đăng xuất</a>
                    </div>
                  </li>
                </ul>
            </li>
        </ul>
      </div>
    </nav>
</header>

