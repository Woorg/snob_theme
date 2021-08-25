
<section class="hero">
  <div class="hero__container container" >
    <div class="hero__content">
      </div>
      <div class="hero__image">
        {!! wp_get_attachment_image( $hero_bg, 'full') !!}
      </div>
      <div class="hero__text">{!! wpautop($hero_text) !!}</div>
    </div>
  </div>
</section>
