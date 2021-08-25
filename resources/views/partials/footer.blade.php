@php
    $instagram_icon = carbon_get_theme_option('instagram_icon');
    $instagram_url  = carbon_get_theme_option('instagram_url');
    $telegram_icon  = carbon_get_theme_option('telegram_icon');
    $telegram_url   = carbon_get_theme_option('telegram_url');
    $behance_icon   = carbon_get_theme_option('behance_icon');
    $behance_url    = carbon_get_theme_option('behance_url');
    $copyright      = carbon_get_theme_option( 'copyright' );
@endphp


<footer class="footer">
  <div class="footer__container container">
    <small class="footer__copyright">&copy; {{ date('Y') }} {{ $copyright }}</small>

    <ul class="footer__social social">
        <li class="social__item">
            <a href="{{ esc_url($behance_url) }}" class="social__link" target="_blank">
                {!! wp_get_attachment_image($behance_icon, 'thumbnail') !!}
            </a>
        </li>
        <li class="social__item">
            <a href="{{ esc_url($instagram_url) }}" class="social__link" target="_blank">
                {!! wp_get_attachment_image($instagram_icon, 'thumbnail') !!}
            </a>
        </li>
        <li class="social__item">
            <a href="{{ esc_url($telegram_url) }}" class="social__link" target="_blank">
                {!! wp_get_attachment_image($telegram_icon, 'thumbnail') !!}
            </a>
        </li>

    </ul>

  </div>
</footer>

