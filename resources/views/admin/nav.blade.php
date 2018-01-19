<nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top bordered-top">
  <a class="navbar-brand" href="{{ route('dashboard') }}">Age Limit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('age-limit.index') }}">Polls</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </li>
     
    </ul>
  </div>
</nav>
