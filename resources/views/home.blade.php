
@extends('layouts.layout-my')

@section('content')
<!-- Container START -->
<div class="container">
    <div class="row g-4">

    <!-- Sidenav START -->
    @include('components.left-sidenav')
    <!-- Sidenav END -->

    <!-- Main content START -->
        <div class="col-md-8 col-lg-6 vstack gap-4">

            <!-- Story START -->
{{--           @include('components.stories')--}}
            <!-- Story END -->

            <!-- Share feed START -->
{{--            <div style="max-height: auto">--}}
{{--                @include('components.share')--}}
{{--            </div>--}}
            <!-- Share feed END -->

{{--            <!-- Card feed item START  post 1-->--}}
{{--            @include('components.card_items.post-1')--}}
{{--            <!-- Card feed item END -->--}}

{{--            <!-- Card feed item START post 2-->--}}
{{--            @include('components.card_items.post-2')--}}
{{--            <!-- Card feed item END -->--}}

{{--            <!-- Card feed item START post 3-->--}}
{{--            @include('components.card_items.post-3')--}}
{{--            <!-- Card feed item END -->--}}

            <!-- Card feed item START post text -->
            @foreach($posts as $post)
                @include('components.card_items.post-text', ['post' => $post])
            @endforeach
            <!-- Card feed item END -->

            <!-- Card feed item START People you may know -->
{{--            @include('components.card_items.people-you-may-know')--}}
            <!-- Card feed item END -->

            <!-- Card feed item START question -->
{{--            @include('components.card_items.question')--}}
            <!-- Card feed item END -->

            <!-- Card feed item START question result -->
{{--            @include('components.card_items.question-result')--}}
            <!-- Card feed item END -->


            <!-- Card feed item START post 4-->
{{--            @include('components.card_items.post-4')--}}
            <!-- Card feed item END -->

            <!-- Story START -->
{{--            @include('components.stories-2')--}}
            <!-- Story END -->

            <!-- Card feed item START video post -->
{{--            @include('components.card_items.post-video')--}}
            <!-- Card feed item END -->

            <!-- Load more button START -->
            <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
                <span class="load-text"> Load more </span>
                <div class="load-icon">
                    <div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </a>
            <!-- Load more button END -->

        </div>
        <!-- Main content END -->

        <!-- Right sidebar START -->
    @include('components.right-sidenav')
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
</div>
<!-- Container END -->

@endsection

@include('js.like')
@include('js.comment')
