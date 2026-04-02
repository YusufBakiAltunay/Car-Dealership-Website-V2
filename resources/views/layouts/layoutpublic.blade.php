@include('layouts.base.publicstart')

<div class="flex flex-col min-h-screen">

    @include('layouts.base.publicheader')

    <!-- De publieke navigatie -->
    @include('layouts.base.publicnavbar')

    <!-- De content (flex-1 zorgt dat deze alle ruimte pakt) -->
    <main class="flex-1 container mx-auto p-4">
        @yield('content')
    </main>

    <!-- De footer -->
    @include('layouts.base.publicfooter')

</div>

@include('layouts.base.end')
