

<div class="col-md-6 col-lg-12">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h5 class="card-title">About</h5>
            <!-- Button modal -->
        </div>
        <!-- Card body START -->
        <div class="card-body position-relative pt-0">
            <p>He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy.</p>
            <!-- Date time -->
            <ul class="list-unstyled mt-3 mb-0">
                <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong> {{date('F j, Y', strtotime($user->profile->birthday))}} </strong> </li>
                <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single </strong> </li>
                <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong>{{$user->email}}</strong> </li>
            </ul>
        </div>
        <!-- Card body END -->
    </div>
</div>
