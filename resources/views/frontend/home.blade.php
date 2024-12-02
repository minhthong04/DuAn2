@extends('frontend.layouts.master')

@section('content')
    <!-- Hero news -->
    @include('frontend.home-components.hero-silder')
    <!-- End Hero news -->

    <!-- Popular news category -->
    @include('frontend.home-components.main-news')
    <!-- End Popular news category -->
@endsection
