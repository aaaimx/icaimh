<style>
  /* Estilo general del dropdown */
  .navbar .dropdown-menu {
    background-color: #d16300 !important;
    border: none;
    border-radius: 0;
    margin: 0;
    padding: 0;
    box-shadow: none !important;
  }

  /* Elementos individuales del menú */
  .navbar .dropdown-menu .dropdown-item {
    background-color: #d16300;
    color: white;
    padding: 10px 20px;
    font-weight: 500;
    /* border-bottom: 1px solid rgba(255, 255, 255, 0.1); */
  }

  /* Último ítem sin borde inferior */
  .navbar .dropdown-menu .dropdown-item:last-child {
    border-bottom: none;
  }

  /* Hover más visible */
  .navbar .dropdown-menu .dropdown-item:hover {
    background-color: #a74400;
    color: black;
  }

  /* Flecha blanca del toggle */
  .navbar .dropdown-toggle::after:hover {
    border-top-color: black;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light py-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="/public/img/logo/logo_icaimh.png" alt="icaimh" width="60" />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="justify-content-end collapse navbar-collapse"
      id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/#venue">Venue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/#cfp">Call for papers</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="/#organizers">Organizers</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            ORGANIZERS
          </a>
          <ul class="dropdown-menu center-dropdown">
            <li><a class="dropdown-item no-active" href="/#pChairs">PROGRAM CHAIRS</a></li>
            <li><a class="dropdown-item no-active" href="/#pCommittee">PROGRAM COMMITTEE</a></li>
            <li><a class="dropdown-item no-active" href="/#staff">STAFF</a></li>
          </ul>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link" href="/#partners">Partners</a>
        </li> -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            PARTNERS
          </a>
          <ul class="dropdown-menu center-dropdown">
            <li><a class="dropdown-item no-active" href="/#localOrganizers">LOCAL ORGANIZERS</a></li>
            <li><a class="dropdown-item no-active" href="/#programOrganizers">PROGRAM ORGANIZERS</a></li>
            <li><a class="dropdown-item no-active" href="/#sponsors">PARTNERS/SPONSORS</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/#contact">Contact</a>
        </li>

        <li class="nav-item button-join">
          <a class="" href="/join">Join Now</a>
        </li>
      </ul>
    </div>
  </div>
</nav>