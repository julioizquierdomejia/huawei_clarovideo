<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark pt-md-4 px-xl-5">
    <a class="navbar-brand mr-1" href="/">
        <img class="logo" src="{{ asset('img/logo_huawei.png') }}" width="180">
    </a>
    <span class="px-2 px-md-3 text-muted"> <img class="raya" src="{{ asset('img/raya.png') }}" width="3" height="50"> </span>
    <a href="https://appgallery.huawei.com/#/app/C101017573?channelId=marketing&detailType">
      <img class="logo" src="{{ asset('img/logo_claro_video.png') }}" width="160" style="margin-bottom: 8px;">
    </a>
    <ul class="navbar-nav ml-auto align-items-center flex-row">
      <li class="nav-item">
        @if (Auth::user())
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-sm text-white" href="/logout" style="font-size: 15px;min-width: 0" type="submit"><span class="d-none d-md-inline-block">Cerrar sesión</span> <i class="fas fa-sign-out-alt"></i></button>
        </form>
        @endif
      </li>
      <li class="nav-item d-none d-md-block">
        <a class="nav-link" href="https://consumer.huawei.com/pe/mobileservices/appgallery/">
          <img class="logo-app_gallery" src="{{ asset('img/exploralo-app-gallery.png') }}" width="140"></a>
      </li>
    </ul>
  </nav>
</header>