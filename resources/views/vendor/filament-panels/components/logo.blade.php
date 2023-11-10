<h2 style="font-size: 24px; font-weight: bold">
    @if (!empty(Auth::user()->name))
        {{ Auth::user()->name }}
    @else
        Conscience Homes
    @endif
    <a class="ml-4 p-4 bg-blue-400" href="/">Home</a>
</h2>
