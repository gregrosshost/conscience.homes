<h2 style="font-size: 24px; font-weight: bold">
    <a class="ml-4 p-4 bg-blue-400" href="/">Home</a>
    @if (!empty(Auth::user()->name))
        {{ Auth::user()->name }}
    @else
        Conscience Homes
    @endif
</h2>
