<div class="col-md-6 col-lg-12">
    <div class="card">
        <!-- Card header START -->
        <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
            <h5 class="card-title">Subscriptions <span class="badge bg-danger bg-opacity-10 text-danger">{{$user->subscriptions()->count()}}</span></h5>
            <a class="btn btn-primary-soft btn-sm" href="#!"> See all subscriptions</a>
        </div>
        <!-- Card header END -->
        <!-- Card body START -->
        <div class="card-body position-relative pt-0">
            <div class="row g-3">

                @foreach($user->subscriptions() as $sub)


{{--                    @dd($sub)--}}

{{--                @php--}}
{{--                echo '<pre>';--}}
{{--                var_dump($sub->profile->photo)--}}
{{--                @endphp--}}

                    <div class="col-6">
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-story avatar-xl">
                                <a href="{{route('show.user', ['name' => $sub->name])}}"><img class="avatar-img rounded-circle" src="{{ asset('storage/'. $sub->profile->photo)}}" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="{{route('show.user', ['name' => $sub->name])}}"> {{ $sub->name}} </a></h6>
                            <p class="mb-0 small lh-sm">16 mutual connections</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Send message" data-bs-original-title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove friend" data-bs-original-title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                        </div>
                    </div>
                    <!-- Friends item END -->
                </div>
                @endforeach
            </div>
        </div>
        <!-- Card body END -->
    </div>
</div>
