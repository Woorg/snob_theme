<section id="feedback" class="feedback">
  <div class="feedback__container container">
    <div class="feedback__content">
      <h2 class="feedback__title">{{ $title }}</h2>
      <div class="feedback__text">{!! $text !!}</div>
      <a class="feedback__сta button button_third open-popup" data-effect="mfp-zoom-in" href="#feedback-form">{{ $button_text }}</a>
    </div>

    <div id="feedback-form" class="feedback__form form mfp-hide">
      <h3 class="feedback__form-title">{{ $form_title }}</h3>
      {!! do_shortcode($form_shortcode) !!}
    </div>

  </div>

</section>


