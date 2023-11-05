@php
    use Illuminate\Support\Facades\Auth;
@endphp

<h2 style="font-size: 24px; font-weight: bold">
    @if (!empty(Auth::user()->name))
        {{ Auth::user()->name }}
    @else
        Conscience Homes
    @endif
</h2>
