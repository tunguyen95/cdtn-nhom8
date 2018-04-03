<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i><span>Người dùng</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Loại sản phẩm</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                    <li><a href="{{ route('categories.create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Bài tin</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{ route('articles.index') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                    <li><a href="{{ route('articles.create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                    <li><a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>