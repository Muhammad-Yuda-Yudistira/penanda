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
      </div>
    </div>
  </nav>