<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('dashboard') ? 'bg-gradient-primary active' : '' }}" href="{{ route('dashboard') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white  {{ Request::is('categories') || Request::is('categories/create') ? 'bg-gradient-primary active' : '' }}  " href="{{ route('category.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Category</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white  {{ Request::is('products') || Request::is('products/create') ? 'bg-gradient-primary active' : '' }}  " href="{{ route('product.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Product</span>
        </a>
      </li>

    </ul>
  </div>
