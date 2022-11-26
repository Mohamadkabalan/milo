<!-- HEADER TopBar -->
<nav id="top" class="header-topbar">
    <div class="row no-margin">
        <div class="col-sm-6 ">
            <div class="pull-left header-topbar__locale">
                <div class="dropdown">
                    <div class="locale-icon">
                    </div>

                    <div class="select-icon-container">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 header-topbar__login">
            <div class="action float-right">
                @if(!auth()->guard('web')->check())
                <a href="sign-up.html" class="btn btn-link">Sign Up</a>
                <a href="{{route('login')}}" class="btn btn-primary">Sign In</a>
                @else
                    <a href="{{route('logout')}}" class="btn btn-primary">Sign Out</a>
                @endif

            </div>
        </div>
    </div>
</nav>
<!-- END HEADER TopBar -->
<!-- HEADER MiddleBar -->
<header id="sticky-header" class="sticky-header header-middle">
    <div id="header-container" class="row col-12 remove-padding-margin velocity-divide-page">
         <h3 style="color: white" class="pl-5 ">Milos Survey</h3>
        <div class="row no-margin right searchbar">
            <div class="col-7 no-padding input-group">
                <form role="search" id="search-form" action="/">
                    <div role="toolbar" class="btn-toolbar full-width">
                        <div class="row header-search-container">
                            <div class="col-md-4 no-padding">
                            </div>
                            <div class="selectdiv col-md-3  no-padding">
                            </div>
                            <div class="full-width col-md-5 no-padding">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <a href="#" class="wishlist-btn">
                    <span></span>
                    <!-- <span class="badge">2</span> -->
                </a>
                <a href="#" class="compare-btn">
                    <span></span>
                    <!-- <span class="badge">2</span> -->
                </a>
                <div class="mini-cart-container pull-right">
                    <div class="dropdown disable-active">
                        <button type="button" class="btn btn-link disable-box-shadow cursor-not-allowed" id="mini-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="mini-cart-content">
                            </div>
                            <div class="down-arrow-container">
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu--cart dropdown-menu-right" aria-labelledby="mini-cart">
                            <div class="modal-footer__actions cart-dropdown__footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER MiddleBar -->
