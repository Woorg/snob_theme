@extends('layouts.app-inner')

@section('content')

@php
  $project_subtitle = carbon_get_post_meta( get_the_ID(),'project_subtitle' );
  $project_gallery = carbon_get_post_meta( get_the_ID(),'project_gallery' );
@endphp

<section class="projects projects_single">
  <div class="projects__container container">

    <div class="projects__top">
      {{-- <h1 class="projects__title title title_secondary ">{{ the_title() }}</h1> --}}
      <p class="projects__subtitle">{{ $project_subtitle }}</p>
    </div>

    <div class="projects__grid">
      @foreach ($project_gallery as $image)
        <article class="projects__project">
          <a class="projects__link" href="{{ wp_get_attachment_image_url( $image, 'full' ) }}">
            <div class="projects__image">
              {!! wp_get_attachment_image( $image, 'project_thumb' ) !!}
            </div>
          </a>
        </article>
      @endforeach
    </div>

    <a class="projects__more button button_secondary" href='{{ site_url('/projects') }}'>Больше проектов</a>

  </div>
</section>



@endsection
