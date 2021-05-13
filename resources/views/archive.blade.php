@extends('layouts.app-inner')
@section('content')

<section class="projects projects_archive ">
  <div class="projects__container">

    <h2 class="projects__title title container">{{ post_type_archive_title() }}</h2>

    @php
      $projects = new WP_Query([
        'post_type' => 'project',
        'posts_per_page' => 6,
        'orderby' => 'id',
        'order' => 'ASC',
      ]);

      $i = 0;

    @endphp

    <div class="projects__grid grid">
      @while ( $projects->have_posts() ) @php $projects->the_post(); @endphp

        @include('partials.content-archive' )

      @endwhile @php wp_reset_postdata(); @endphp

    </div>

    <div class="container">
      <button class="projects__more button button_secondary loadmore">Больше проектов</button>
    </div>


  </div>
</section>


@endsection
