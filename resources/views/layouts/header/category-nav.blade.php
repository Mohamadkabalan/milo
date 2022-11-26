<!-- HEADER CategoryNav -->
<div id="category-menu-header" class="row vc-header header-shadow active">
  <div class="vc-small-screen container">
    <div class="row">
      <div class="col-6">
        <div class="nav-container">
          <div class="wrapper">
            <div class="greeting drawer-section">
              <i class="fal fa-user-circle profile"></i>
              <span>
                <a href="#">Welcome, Guest !</a>
                <i class="far fa-times close js-close-nav"></i>
              </span>
            </div>
            <ul class="list-unstyled category-wrapper">
              @if(auth()->guard('web')->check())
                <li>
                  <a href="{{route('home')}}">Survey</a>
                </li>

                <li>
                  <a href="{{ route('statistics') }}">Statistics</a>
                </li>
              @endif
              @if(auth()->guard('web')->check())
                @if(auth()->guard('web')->user()->is_admin)
                  <li>
                    <a href="{{route('pending-users')}}">Pending Users</a>
                  </li>
                  <li>
                    <a href="{{route('fetch-questions')}}">Questions</a>
                  </li>
                @endif
              @endif

            </ul>
            <ul class="list-unstyled meta-wrapper">
              <li>
                <div class="language-logo-wrapper">
                  <span class="icon american-english-icon"></span>
                </div>
                <span>English</span>
                <i class="far fa-angle-right arrow-right"></i>
              </li>
              <li>
                <a href="sign-up.html" class="btn btn-outline-primary">
                  <span>Sign up</span>
                </a>
                <a href="sign-in.html" class="btn btn-primary">
                  <span>Sign In</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="close-wrapper"></div>
        </div>

        <a class="hamburger-wrapper js-toggle-nav" href="#">
          <i class="far fa-bars"></i>
        </a>
        <h5 style="color: white;" class="pl-2">Milos Survey</h5>
      </div>
      <div class="right-vc-header col-6 dropdown">
        <a href="#" class="js-toggle-search">
          <i class="far fa-search"></i>
        </a>
        <a href="#" class="wishlist-btn">
          <i class="far fa-heart"></i>
        </a>
        <a href="#" class="compare-btn">
          <i class="far fa-compress-alt"></i>
        </a>
        <a href="#" id="mini-cart-mobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="badge-wrapper">
            <span class="badge">0</span>
          </div>
          <i class="far fa-shopping-cart"></i>
        </a>
        <div class="dropdown-menu dropdown-menu--cart dropdown-menu-right" aria-labelledby="mini-cart-mobile">
        </div>
      </div>
      <div class="row no-margin right searchbar">
        <div class="col-7 no-padding input-group">
          <form role="search" id="search-form" action="/">
            <div role="toolbar" class="btn-toolbar full-width">
              <div class="row header-search-container">
                <div class="geolocation-container col-md-4 no-padding">
                  <input id="geolocation_search" name="geolocation_search" type="search" placeholder="City, State or Zip code" class="form-control geolocation_search">
                </div>
                <div class="selectdiv col-md-3  no-padding">
                  <select name="category" class="form-control fs13 styled-select">
                    <option value="">All Categories</option>
                  </select>
                  <div class="select-icon-container">
                    <span class="select-icon fal fa-angle-down"></span>
                  </div>
                </div>
                <div class="full-width col-md-5 no-padding">
                  <input id="search_products" required="required" name="term" type="search" placeholder="Search for items or shows" class="form-control ui-autocomplete-input" autocomplete="off">
                  <button type="submit" id="header-search-icon" class="btn">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-5">
          <a href="#" class="wishlist-btn">
            <i class="far fa-heart"></i>
            <span>Wishlist</span>
          </a>
          <a href="#" class="compare-btn">
            <i class="far fa-compress-alt"></i>
            <span>Compare</span>
          </a>
          <div class="mini-cart-container pull-right">
            <div class="dropdown disable-active">
              <button type="button" id="mini-cart" class="btn btn-link disable-box-shadow cursor-not-allowed">
                <div class="mini-cart-content">
                  <i class="far fa-shopping-cart"></i>
                  <span class="cart-text">Cart</span>
                </div>
                <div class="down-arrow-container">
                  <span class="fal fa-angle-down"></span>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-list right">
    <ul class="list-unstyled">
      @if(auth()->guard('web')->check())
      <li>
        <a href="{{route('home')}}">Survey</a>
      </li>

      <li>
        <a href="{{ route('statistics') }}">Statistics</a>
      </li>
      @endif
      @if(auth()->guard('web')->check())
        @if(auth()->guard('web')->user()->is_admin)
          <li>
            <a href="{{route('pending-users')}}">Pending Users</a>
          </li>
          <li>
            <a href="{{route('fetch-questions')}}">Questions</a>
          </li>
        @endif
      @endif

    </ul>
  </div>
</div>
<!-- END HEADER CategoryNav -->