@php
    use Illuminate\Support\Facades\Auth;
@endphp

<h2>
    @if (!empty(Auth::user()->name))
        {{ Auth::user()->name }}
    @else
        Conscience Homes
    @endif
</h2>
