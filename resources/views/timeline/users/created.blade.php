<li>
    <i class="fa fa-user bg-aqua"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{  \Carbon\Carbon::now()->format('H:i d-m-Y') }}</span>

        <h3 class="timeline-header no-border"><a href="{{ route('users.profile',$d->user->id) }}">{{ $d->user->first_name }} {{ $d->user->last_name }}</a> registered to Amicus Platform</h3>
    </div>
</li>