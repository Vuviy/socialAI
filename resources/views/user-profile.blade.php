
@extends('layouts.layout-my')

@section('content')

{{--    @dd($user->followers->pluck('user_id')->toArray())--}}

    <div class="container">
        <div class="row g-4">

            <!-- Main content START -->
            <div class="col-lg-8 vstack gap-4">
                <!-- My profile START -->
                <div class="card">
                    <!-- Cover image -->
                    <div class="h-200px rounded-top" style="background-image:url({{ asset('img')}}/05.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                    <!-- Card body START -->
                    <div class="card-body py-0">
                        <div class="d-sm-flex align-items-start text-center text-sm-start">
                            <div>
                                <!-- Avatar -->
                                <div class="avatar avatar-xxl mt-n5 mb-3">
                                    <img class="avatar-img rounded-circle border border-white border-3" src="{{ asset('storage/'. $user->profile->photo)}}" alt="">
                                </div>
                            </div>
                            <div class="ms-sm-4 mt-sm-3">
                                <!-- Info -->
                                <h1 class="mb-0 h5">{{$user->name}} <i class="bi bi-patch-check-fill text-success small"></i></h1>
                                <p>250 connections</p>
                            </div>
                            <!-- Button -->
                            <div class="d-flex mt-3 justify-content-center ms-sm-auto">
{{--                                <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i> Edit profile </button>--}}


{{--                                @if($user->followers)--}}

{{--                                @dd($user->followersRelation)--}}
{{--                                @dd(auth()->user()->subscriptions()->pluck('id')->toArray())--}}
{{--                                @endif--}}
                                @if(auth()->user())
                                <button class="btn btn-danger-soft me-2 follow" type="button">
                                    @if(in_array($user->id, auth()->user()->subscriptions()->pluck('id')->toArray()))
                                        Unfollow
                                    @else
                                        <i class="bi bi-patch-check"></i> Follow
                                    @endif
                                </button>
                                @endif
{{--                                <button class="btn btn-danger-soft me-2 follow" type="button"> <i class="bi bi-patch-check"></i> Follow </button>--}}

                                <a href="{{route('messaging')}}?user={{$user->id}}" class="btn btn-danger-soft me-2"> <i class="bi bi-chat-left"></i> Message </a>
                                <div class="dropdown">
                                    <!-- Card share action menu -->
                                    <button class="icon-md btn btn-light" type="button" id="profileAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <!-- Card share action dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- List profile -->
                        <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                            <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> Lead Developer</li>
                            <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> New Hampshire</li>
                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Nov 26, 2019</li>
                        </ul>
                    </div>
                    <!-- Card body END -->
                    <div class="card-footer mt-3 pt-2 pb-0">
                        <!-- Nav profile pages -->
                        <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                            <li class="nav-item"> <a class="nav-link active" href="my-profile.html"> Posts </a> </li>
{{--                            <li class="nav-item"> <a class="nav-link" href="my-profile-about.html"> About </a> </li>--}}
{{--                            <li class="nav-item"> <a class="nav-link" href="my-profile-connections.html"> Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>--}}
{{--                            <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>--}}
{{--                            <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>--}}
{{--                            <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>--}}
{{--                            <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>--}}
                        </ul>
                    </div>
                </div>
                <!-- My profile END -->

                <!-- Share feed START -->
{{--                @include('components.share-profile')--}}
                <!-- Share feed END -->


{{--                <div class="card card-body">--}}
{{--                    <div class="d-flex mb-3">--}}
{{--                        <!-- Avatar -->--}}
{{--                        <div class="avatar avatar-xs me-2">--}}
{{--                            <a href="#"> <img class="avatar-img rounded-circle" src="{{ asset('storage/'. $user->profile->photo)}}" alt=""> </a>--}}
{{--                        </div>--}}
{{--                        <!-- Post input -->--}}
{{--                        <form class="w-100">--}}
{{--                            <input class="form-control pe-4 border-0" placeholder="Share your thoughts..." data-bs-toggle="modal" data-bs-target="#modalCreateFeed">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <!-- Share feed toolbar START -->--}}
{{--                    <ul class="nav nav-pills nav-stack small fw-normal">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> <i class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown ms-sm-auto">--}}
{{--                            <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                <i class="bi bi-three-dots"></i>--}}
{{--                            </a>--}}
{{--                            <!-- Dropdown menu -->--}}
{{--                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">--}}
{{--                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>--}}
{{--                                <li><hr class="dropdown-divider"></li>--}}
{{--                                <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    --}}
{{--                    <!-- Share feed toolbar END -->--}}
{{--                </div>--}}
{{--                    @include('components.share-profile', ['user' => $user])--}}

                <!-- Share feed END -->

                <!-- Card feed item START -->
{{--                @include('components.card_items.post-1')--}}
                <!-- Card feed item END -->

                <!-- Card feed item START -->
                @foreach($user->posts as $post)
                    @include('components.card_items.post-text', ['post' => $post])
                @endforeach
                <!-- Card feed item END -->
            </div>
            <!-- Main content END -->

            <!-- Right sidebar START -->
            <div class="col-lg-4">

                <div class="row g-4">

                    <!-- Card START -->
                    @include('components.profile.about')
                    <!-- Card END -->

                    <!-- Card START -->
{{--                    @include('components.profile.experience')--}}
                    <!-- Card END -->

                    <!-- Card START -->
{{--                    @include('components.profile.photos')--}}
                    <!-- Card END -->

                    <!-- Card START -->
{{--                    @include('components.profile.friends')--}}

                <!-- Card END -->
                </div>

            </div>
            <!-- Right sidebar END -->

        </div> <!-- Row END -->
    </div>
@endsection

@include('js.scripts')

