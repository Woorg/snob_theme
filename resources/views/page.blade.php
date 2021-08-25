@extends('layouts.app-inner')

@section('content')
  <div class="page__container page__content container text">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
  </div>
@endsection
