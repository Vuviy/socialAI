
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
                <a class="nav-link" href="#"> <i class="bi bi-chat-fill pe-1"></i>Comments (0)</a>
            </li>
        </ul>
        <!-- Feed react END -->
    </div>
    <!-- Card body END -->
    <!-- Card Footer START -->
    <div class="card-footer py-3">
        <!-- Feed react START -->
        <ul class="nav nav-fill nav-stack small">
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link mb-0 active" href="#"> <i class="bi bi-heart pe-1"></i>Liked ({{$post->likes->count()}})</a>--}}
{{--            </li>--}}
            <!-- Card share action dropdown START -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link mb-0" id="cardShareAction6" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                </a>
                <!-- Card share action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction6">
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                </ul>
            </li>
            <!-- Card share action dropdown END -->
            <li class="nav-item">
                <a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>
            </li>
        </ul>
        <!-- Feed react END -->
    </div>
    <!-- Card Footer END -->
</div>

