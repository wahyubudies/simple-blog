<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="examples/dashboard.html">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Request::path() ? 'active' : '') }}" href="{{route('post.index')}}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Post</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Tag</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Category</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>