{{--
  Template Name: Contacts Template
--}}

@extends('layouts.app-contacts')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    {{-- @include('partials.page-header') --}}
    @include('partials.content-page')
  @endwhile
@endsection
