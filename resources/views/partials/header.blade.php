@php
  $logo = carbon_get_theme_option('logo_image');
@endphp

<header class="header">
  <div class="header__container container">

    <a class="header__logo logo" href="{{ site_url('/') }}">
      {!! wp_get_attachment_image( $logo, 'full' ) !!}
    </a>

    <nav class="header__nav nav nav_primary">
      <button class="nav__trigger">
        <span class="nav__trigger-line"></span>
        <span class="nav__trigger-line"></span>
        <span class="nav__trigger-line"></span>
      </button>

        {!! wp_nav_menu([
          'theme_location'  => 'primary_navigation',
          'container'       => null,
          'menu_class'      => 'nav__list',
        ]) !!}

    </nav>
  </div>
</header>



