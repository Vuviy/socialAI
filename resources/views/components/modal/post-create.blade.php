<form action="{{route('post.create')}}" method="post">
    @csrf
    <div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCreateFeed">Create post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle" src="{{ auth()->user() ? asset('storage/'. auth()->user()->profile->photo) : null}}" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100">
                            <textarea name="content" class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus=""></textarea>
                        </form>
                    </div>
                    <!-- Feed rect START -->
    {{--                <div class="hstack gap-2">--}}
    {{--                    <a class="icon-md bg-success bg-opacity-10 text-success rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Photo" data-bs-original-title="Photo"> <i class="bi bi-image-fill"></i> </a>--}}
    {{--                    <a class="icon-md bg-info bg-opacity-10 text-info rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Video" data-bs-original-title="Video"> <i class="bi bi-camera-reels-fill"></i> </a>--}}
    {{--                    <a class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Events" data-bs-original-title="Events"> <i class="bi bi-calendar2-event-fill"></i> </a>--}}
    {{--                    <a class="icon-md bg-warning bg-opacity-10 text-warning rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Feeling/Activity" data-bs-original-title="Feeling/Activity"> <i class="bi bi-emoji-smile-fill"></i> </a>--}}
    {{--                    <a class="icon-md bg-light text-secondary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Check in" data-bs-original-title="Check in"> <i class="bi bi-geo-alt-fill"></i> </a>--}}
    {{--                    <a class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Tag people on top" data-bs-original-title="Tag people on top"> <i class="bi bi-tag-fill"></i> </a>--}}
    {{--                </div>--}}
                    <!-- Feed rect END -->
                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer row justify-content-between">
                    <!-- Select -->
                    <div class="col-lg-3">
                        <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                            <div class="choices__inner">
                                <select class="form-select js-choice choices__input" data-position="top" data-search-enabled="false" hidden="" tabindex="-1" data-choice="active">
                                    <option value="PB" data-custom-properties="[object Object]">Public</option>
                                </select>
                                <div class="choices__list choices__list--single">
                                    <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="PB" data-custom-properties="[object Object]" aria-selected="true">Public</div>
                                </div>
                            </div>
    {{--                        <div class="choices__list choices__list--dropdown" aria-expanded="false">--}}
    {{--                            <div class="choices__list" role="listbox">--}}
    {{--                                <div id="choices--a6of-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="PV" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Custom</div>--}}
    {{--                                <div id="choices--a6of-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="PV" data-select-text="Press to select" data-choice-selectable="">Friends</div>--}}
    {{--                                <div id="choices--a6of-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="PV" data-select-text="Press to select" data-choice-selectable="">Only me</div>--}}
    {{--                                <div id="choices--a6of-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="PB" data-select-text="Press to select" data-choice-selectable="">Public</div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="col-lg-8 text-sm-end">
                        <button type="button" class="btn btn-danger-soft me-2"> <i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
                        <button type="submit" class="btn btn-success-soft">Post</button>
                    </div>
                </div>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
</form>
