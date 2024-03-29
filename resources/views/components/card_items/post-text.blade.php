
<div class="card">
    <!-- Card header START -->
    <div class="card-header border-0 pb-0">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar me-2">
                    <a href="#"> <img class="avatar-img rounded-circle" src="{{$post->user->profile->photo ? asset('storage/'. $post->user->profile->photo) : asset('img/12.jpg')}}" alt=""> </a>
                </div>
                <!-- Title -->
                <div>
                    <h6 class="card-title mb-0"> <a href="{{route('show.user', ['name' => $post->user->name])}}">{{$post->user->name}} </a></h6>
                    <p class="mb-0 small">{{date('F j, Y', strtotime($post->created_at))}}</p>
                    <p class="mb-0 small">{{\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}}</p>
                </div>
            </div>
            <!-- Card share action menu -->
            <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardShareAction5" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </a>
            <!-- Card share action dropdown menu -->
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction5">
                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
            </ul>
        </div>
        <!-- Card share action END -->
    </div>
    <!-- Card header START -->

    <!-- Card body START -->
    <div class="card-body pb-0">
        <p>{{$post->content}}</p>
        <!-- Feed react START -->
        <ul class="nav nav-stack pb-2 small">
            <li class="nav-item">
                <button class="nav-link active text-secondary btn-like" data-id="{{$post->id}}"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> {{$post->likes->count()}} </button>
            </li>
            <li class="nav-item ms-sm-auto">
                <button class="nav-link btn-comments" data-id="{{$post->id}}"> <i class="bi bi-chat-fill pe-1"></i>Comments ({{$post->comments->count()}})</button>
            </li>
        </ul>
        <!-- Feed react END -->

        <!-- Add comment -->
        <div class="comment-block d-none" data-comments-id="{{$post->id}}">
        <div class="d-flex mb-3">
            <!-- Avatar -->
{{--            <div class="avatar avatar-xs me-2">--}}
{{--                <div > <img class="avatar-img rounded-circle" src="{{@asset('img')}}/12.jpg" alt=""> </div>--}}
{{--            </div>--}}
            <!-- Comment box  -->
            <div class="nav nav-item w-100 position-relative">
                <textarea data-id="{{$post->id}}" data-autoresize class="form-control pe-5 bg-light comment-body" rows="1" placeholder="Add a comment..."></textarea>
                <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0 send-comment" data-id="{{$post->id}}" type="submit">
                    <i class="bi bi-arrow-up-circle-fill"></i>
{{--                    send--}}
                </button>
            </div>
        </div>
        <!-- Comment wrap START -->


        <ul class="comment-wrap list-unstyled" data-id="{{$post->id}}">

            @foreach($post->comments as $comment)
                <!-- Comment item START -->
                <li class="comment-item">

                    <div class="d-flex position-relative">




                        <!-- Avatar -->
                        <div class="avatar avatar-xs">
                            <a href="{{route('show.user', ['name' => $comment->user->name])}}"><img class="avatar-img rounded-circle" src="{{  asset('storage/'.$comment->user->profile->photo)}}" alt=""></a>
                        </div>
                        <div class="ms-2 w-100 mb-3">

                            @if($comment->parentComment)
                            <div class="bg-light rounded-start-top-0 p-3 rounded mb-1">
                                <small>reply to:</small>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <small class="mb-1"> <a href="{{route('show.user', ['name' => $comment->parentComment->user->name])}}"> {{$comment->parentComment->user->name}} </a></small>
                                    <small class="ms-2">{{\Carbon\Carbon::createFromTimeStamp(strtotime($comment->parentComment->created_at))->diffForHumans()}}</small>
                                </div>
                                <p class="small mb-0">{!!  substr(nl2br($comment->parentComment->text), 0, 35).'...' !!}</p>
                            </div>

                            @endif

                            <!-- Comment by -->
                            <div class="bg-light rounded-start-top-0 p-3 rounded">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1"> <a href="{{route('show.user', ['name' => $comment->user->name])}}"> {{$comment->user->name}} </a></h6>
                                    <small class="ms-2">{{\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans()}}</small>
                                </div>
                                <p class="small mb-0">{!! nl2br($comment->text)!!}</p>
                            </div>
                            <!-- Comment react -->
                            <ul class="nav nav-divider py-2 small" style=" list-style: none;">
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> Like (3)</a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <button class="nav-link reply-btn" data-id="{{$post->id}}" data-reply-id="{{$comment->id}}"> Reply</button>
                                </li>

                                <div data-id="{{$comment->id}}" class=" w-100 position-relative d-none reply-block">
                                    <textarea data-id="{{$comment->id}}" data-autoresize class="form-control pe-5 bg-light comment-body-reply" rows="1" placeholder="Add a comment..."></textarea>
                                    <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0 send-comment-reply" data-id="{{$post->id}}" data-reply-id="{{$comment->id}}" type="submit">
                                        <i class="bi bi-arrow-up-circle-fill"></i>
                                        {{--                    send--}}
                                    </button>
                                </div>

{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> View 5 replies</a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>

                {{--================--}}
                {{--================--}}
                {{--================--}}
                    <!-- Comment item nested START -->
{{--                    <ul class="comment-item-nested list-unstyled">--}}
{{--                        <!-- Comment item START -->--}}
{{--                        <li class="comment-item">--}}
{{--                            <div class="d-flex">--}}
{{--                                <!-- Avatar -->--}}
{{--                                <div class="avatar avatar-xs">--}}
{{--                                    <a href="#!"><img class="avatar-img rounded-circle" src="{{@asset('img')}}/06.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <!-- Comment by -->--}}
{{--                                <div class="ms-2">--}}
{{--                                    <div class="bg-light p-3 rounded">--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <h6 class="mb-1"> <a href="#!"> Lori Stevens </a> </h6>--}}
{{--                                            <small class="ms-2">2hr</small>--}}
{{--                                        </div>--}}
{{--                                        <p class="small mb-0">See resolved goodness felicity shy civility domestic had but Drawings offended yet answered Jennings perceive.</p>--}}
{{--                                    </div>--}}
{{--                                    <!-- Comment react -->--}}
{{--                                    <ul class="nav nav-divider py-2 small">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Like (5)</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Reply</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <!-- Comment item END -->--}}
{{--                        <!-- Comment item START -->--}}
{{--                        <li class="comment-item">--}}
{{--                            <div class="d-flex">--}}
{{--                                <!-- Avatar -->--}}
{{--                                <div class="avatar avatar-story avatar-xs">--}}
{{--                                    <a href="#!"><img class="avatar-img rounded-circle" src="{{@asset('img')}}/07.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <!-- Comment by -->--}}
{{--                                <div class="ms-2">--}}
{{--                                    <div class="bg-light p-3 rounded">--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <h6 class="mb-1"> <a href="#!"> Billy Vasquez </a> </h6>--}}
{{--                                            <small class="ms-2">15min</small>--}}
{{--                                        </div>--}}
{{--                                        <p class="small mb-0">Wishing calling is warrant settled was lucky.</p>--}}
{{--                                    </div>--}}
{{--                                    <!-- Comment react -->--}}
{{--                                    <ul class="nav nav-divider py-2 small">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Like</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Reply</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <!-- Comment item END -->--}}
{{--                    </ul>--}}
                    <!-- Load more replies -->

                    <!-- Comment item nested END -->
                {{--================--}}
                {{--================--}}
                {{--================--}}

                </li>
                <!-- Comment item END -->
            @endforeach

                <a href="#!" id="load-more" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5" data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                    </div>
                    Load more replies
                </a>



{{--            <!-- Comment item START -->--}}
{{--            <li class="comment-item">--}}
{{--                <div class="d-flex">--}}
{{--                    <!-- Avatar -->--}}
{{--                    <div class="avatar avatar-xs">--}}
{{--                        <a href="#!"><img class="avatar-img rounded-circle" src="{{@asset('img')}}/05.jpg" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <!-- Comment by -->--}}
{{--                    <div class="ms-2">--}}
{{--                        <div class="bg-light p-3 rounded">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a> </h6>--}}
{{--                                <small class="ms-2">4min</small>--}}
{{--                            </div>--}}
{{--                            <p class="small mb-0">Removed demands expense account in outward tedious do. Particular way thoroughly unaffected projection.</p>--}}
{{--                        </div>--}}
{{--                        <!-- Comment react -->--}}
{{--                        <ul class="nav nav-divider pt-2 small">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#!"> Like (1)</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#!"> Reply</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#!"> View 6 replies</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- Comment item END -->--}}
        </ul>


        <!-- Comment wrap END -->
        </div>



    </div>
    <!-- Card body END -->



    <!-- Card Footer START -->
    <div class="card-footer py-3">
        <!-- Feed react START -->
{{--        <ul class="nav nav-fill nav-stack small">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link mb-0 active" href="#"> <i class="bi bi-heart pe-1"></i>Liked ({{$post->likes->count()}})</a>--}}
{{--            </li>--}}
{{--            <!-- Card share action dropdown START -->--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a href="#" class="nav-link mb-0" id="cardShareAction6" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)--}}
{{--                </a>--}}
{{--                <!-- Card share action dropdown menu -->--}}
{{--                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction6">--}}
{{--                    <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>--}}
{{--                    <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>--}}
{{--                    <li><hr class="dropdown-divider"></li>--}}
{{--                    <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <!-- Card share action dropdown END -->--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
        <!-- Feed react END -->
    </div>
    <!-- Card Footer END -->



</div>

