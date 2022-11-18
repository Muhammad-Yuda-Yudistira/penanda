<nav class="navbar navbar-expand-lg bg-info navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="img/logo/logo.png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ $title === "Home" ? "active" : "" }}" aria-current="page" href="/">Home</a>
          <a class="nav-link {{ $title === "Product" ? "active" : "" }}" href="/product">Product</a>
          <a class="nav-link {{ $title === "Documentation" ? "active" : "" }}" href="/documentation">Documentation</a>
          <a class="nav-link {{ $title === "Donation" ? "active" : "" }}" href="/donation">Donation</a>
          <a class="nav-link {{ $title === "Contacts" ? "active" : "" }}" href="/contacts">Contacts</a>
        </div>
        @auth
          <div class="navbar-nav ms-auto nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </div>
        @else
          <div class="navbar-nav ms-auto">
            <a href="/login" class="nav-link {{ $title === "Login" ? "active" : "" }}"><i class="bi bi-box-arrow-in-right"></i>Login</a>
          </div>
        @endauth
      </div>
    </div>
  </nav>