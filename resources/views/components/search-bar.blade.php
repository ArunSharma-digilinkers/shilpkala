<form action="{{ url('/shop') }}" method="GET" class="relative">
    @if(request('sort'))<input type="hidden" name="sort" value="{{ request('sort') }}">@endif
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
           class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm font-ui focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
    <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-light-gray" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>
</form>
