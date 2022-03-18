<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #600660;">
  <a href="{{ route('logout') }}" class="brand-link">
    <span style="margin: 37px; font-size: 90%;" class="brand-text font-weight-light"><i class="fa fa-lock"> </i> Đăng xuất</span>
  </a>

  <div class="sidebar">
   
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('public/admins/anhdaidien/anhdaidien.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('home') }}" class="d-block">Máy ảnh Twenty</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="{{ route('orders.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Đơn hàng
              <span class="right badge badge-danger">Mới</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('product.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Sản phẩm
              <span class="right badge badge-danger">Mới</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('categories.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Danh mục sản phẩm
              
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('slider.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Slider
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('settings.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Cài đặt liên hệ
            </p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>