@php
    $instagram_icon = carbon_get_theme_option('instagram_icon');
    $instagram_url  = carbon_get_theme_option('instagram_url');
    $telegram_icon  = carbon_get_theme_option('telegram_icon');
    $telegram_url   = carbon_get_theme_option('telegram_url');
    $copyright      = carbon_get_theme_option( 'copyright' );
@endphp


<footer class="footer">
  <div class="footer__container container">
    <small class="footer__copyright">&copy; {{ date('Y') }} {{ $copyright }}</small>

    <ul class="footer__social social">
        <li class="social__item">
            <a href="{{ esc_url($instagram_url) }}" class="social__link">
                {!! wp_get_attachment_image($instagram_icon, 'thumbnail') !!}
            </a>
        </li>
        <li class="social__item">
            <a href="{{ esc_url($telegram_url) }}" class="social__link">
                {!! wp_get_attachment_image($telegram_icon, 'thumbnail') !!}
            </a>
        </li>

    </ul>

  </div>
</footer>

