@php
  $project_subtitle = carbon_get_post_meta( get_the_ID(),'project_subtitle' );
@endphp


<article class="projects__project">
  <a class="projects__link" href="{{ the_permalink( ) }}">
    <div class="projects__image">
      {{ the_post_thumbnail( get_the_ID(), 'project_thumb' ) }}
    </div>
    <div class="projects__entry">
      {{-- <div class="projects__entry-title">{{ the_title() }}</div> --}}
      <div class="projects__entry-subtitle">{!! $project_subtitle !!}</div>
    </div>

  </a>
</article>
