@if (auth()->user()->isPikr())
    @include('user-pikr.dashboard')
@else
    @include('dashboard')
@endif
