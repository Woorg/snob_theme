<section id="feedback" class="feedback">
  <div class="feedback__container container">
    <div class="feedback__content">
      <h2 class="feedback__title">{{ $title }}</h2>
      <div class="feedback__text">{!! $text !!}</div>

      <div class="feedback__name">{!! $name !!}</div>
      {{-- <div class="feedback__position">{!! $position !!}</div> --}}


      <a class="feedback__phone" href='{{ 'tel:' . str_replace( array(
                    ")",
                    "(",
                    " ",
                    "-",
                  ), "", $phone ) }}'>{!! $phone !!}</a>
      <a class="feedback__email" href='mailto:{{ $email }}'>{!! $email !!}</a>

    </div>


    <div class="feedback__form form">
      {!! do_shortcode($form_shortcode) !!}
    </div>

  </div>
</section>



