<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">E-Shop</a>
      <div class="search-bar">
        <form action="{{ route('serch-product') }}" method="post">
          @csrf
          <div class="input-group">
            <input type="search" class="form-control" id="serch_product" value="{{ Session::get('product') ? Session::get('product') : old('serch_product') }}" placeholder="Search Product" name="serch_product" required >
            <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
          </div>
        </form>    
      </div> 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category') }}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cart-details') }}">Cart
              <span class="badge badge-pill bg-primary cart-count">0</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('view-wishlist') }}">Wishlist
              <span class="badge badge-pill bg-success wishlist-count">0</span>
            </a>
          </li>
          @guest
          @if(Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
          @endif
          @if(Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('my-order') }}">My Order</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </li>
            </ul>
          </li>
          @endguest
          
        </ul>
      </div>
    </div>
  </nav>
