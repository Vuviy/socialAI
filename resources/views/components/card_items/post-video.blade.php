<div class="card">
    <!-- Card header START -->
    <div class="card-header border-0 pb-0">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-story me-2">
                    <a href="#!"> <img class="avatar-img rounded-circle" src="{{@asset('img')}}/12.jpg" alt=""> </a>
                </div>
                <!-- Info -->
                <div>
                    <div class="nav nav-divider">
                        <h6 class="nav-item card-title mb-0"> <a href="#!"> Joan Wallace </a></h6>
                        <span class="nav-item small"> 1day</span>
                    </div>
                    <p class="mb-0 small">12 January at 12:00</p>
                </div>
            </div>
            <!-- Card feed action dropdown START -->
            <div class="dropdown">
                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots"></i>
                </a>
                <!-- Card feed action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction2">
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                </ul>
            </div>
            <!-- Card feed action dropdown END -->
        </div>
    </div>
    <!-- Card header END -->
    <!-- Card body START -->
    <div class="card-body pb-0">
        <p>Comfort reached gay perhaps chamber his <a href="#!">#internship</a>  <a href="#!">#hiring</a> <a href="#!">#apply</a> </p>
    </div>
    <!-- Card img -->
    <div class="overflow-hidden fullscreen-video w-100">

        <!-- HTML video START -->
        <div class="player-wrapper overflow-hidden">
            <video class="player-html" controls crossorigin="anonymous" poster="{{@asset('img')}}/placeholder.jpg">
                <source src="#" type="video/mp4">
            </video>
        </div>
        <!-- HTML video END -->

        <!-- Plyr resources and browser polyfills are specified in the pen settings -->
    </div>
    <!-- Feed react START -->
    <div class="card-body pt-0">
        <ul class="nav nav-stack py-3 small">
            <li class="nav-item">
                <a class="nav-link active" href="#!"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked (56)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
            </li>
            <!-- Card share action START -->
            <li class="nav-item dropdown ms-sm-auto">
                <a class="nav-link mb-0" href="#" id="cardShareAction9" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                </a>
                <!-- Card share action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction9">
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                </ul>
            </li>
            <!-- Card share action END -->
        </ul>
        <!-- Feed react END -->

        <!-- Add comment -->
        <div class="d-flex mb-3">
            <!-- Avatar -->
            <div class="avatar avatar-xs me-2">
                <a href="#!"> <img class="avatar-img rounded-circle" src="{{@asset('img')}}/12.jpg" alt=""> </a>
            </div>

            <!-- Comment box  -->
            <form class="input-group">
                <textarea data-autoresize class="form-control me-2 bg-light rounded" rows="1" placeholder="Add a comment..."></textarea>
                <button class="btn btn-primary mb-0 rounded" type="submit">Post</button>
            </form>
        </div>
        <!-- Comment wrap START -->
        <ul class="comment-wrap list-unstyled mb-0">
            <!-- Comment item START -->
            <li class="comment-item">
                <div class="d-flex">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs">
                        <a href="#!"><img class="avatar-img rounded-circle" src="{{@asset('img')}}/05.jpg" alt=""></a>
                    </div>
                    <div class="ms-2">
                        <!-- Comment by -->
                        <div class="bg-light rounded-start-top-0 p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a></h6>
                                <small class="ms-2">5hr</small>
                            </div>
                            <p class="small mb-0">Preference any astonished unreserved Mrs.</p>
                        </div>
                        <!-- Comment react -->
                        <ul class="nav nav-divider py-2 small">
                            <li class="nav-item">
                                <a class="nav-link" href="#!"> Like (3)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!"> Reply</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!"> View 5 replies</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Comment item nested START -->
                <ul class="comment-item-nested list-unstyled">
                    <!-- Comment item START -->
                    <li class="comment-item">
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs">
                                <a href="#!"><img class="avatar-img rounded-circle" src="{{@asset('img')}}/06.jpg" alt=""></a>
                            </div>
                            <!-- Comment by -->
                            <div class="ms-2">
                                <div class="bg-light p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> <a href="#!"> Lori Stevens </a> </h6>
                                        <small class="ms-2">2hr</small>
                                    </div>
                                    <p class="small mb-0">Dependent on so extremely delivered by. Yet ﻿no jokes worse her why.</p>
                                </div>
                                <!-- Comment react -->
                                <ul class="nav nav-divider py-2 small">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Like (5)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Reply</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Comment item END -->
                </ul>
                <!-- Comment item nested END -->
            </li>
            <!-- Comment item END -->
        </ul>
        <!-- Comment wrap END -->
    </div>
    <!-- Card body END -->
    <!-- Card footer START -->
    <div class="card-footer border-0 pt-0">
        <!-- Load more comments -->
        <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
            <div class="spinner-dots me-2">
                <span class="spinner-dot"></span>
                <span class="spinner-dot"></span>
                <span class="spinner-dot"></span>
            </div>
            Load more comments
        </a>
    </div>
    <!-- Card footer END -->
</div>
