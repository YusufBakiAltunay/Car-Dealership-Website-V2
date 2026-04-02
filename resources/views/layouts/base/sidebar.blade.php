<!-- start sidebar -->
<div id="sideBar"
     class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl transition-all duration-300">

    <!-- sidebar content -->
    <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-6">
            <button id="sideBarHideBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <i class="fad fa-times-circle fa-lg"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Navigation</p>

        {{-- Sidebar Links --}}
        @php
            $sidebarLinks = [
                ['route' => 'products.index', 'label' => 'Products', 'icon' => 'fad fa-shopping-cart'],
                ['route' => 'garage-services.index', 'label' => 'Garage Services', 'icon' => 'fad fa-tools'],
                ['route' => 'cars.index', 'label' => 'Cars', 'icon' => 'fad fa-car'],
                ['route' => 'car-models.index', 'label' => 'Car Models', 'icon' => 'fad fa-cogs'],
                ['route' => 'brands.index', 'label' => 'Brands', 'icon' => 'fad fa-tag'],
                ['route' => 'fuel-types.index', 'label' => 'Fuel Types', 'icon' => 'fad fa-gas-pump'],
            ];
        @endphp

        @foreach($sidebarLinks as $link)
            <a href="{{ route($link['route']) }}"
               class="mb-3 flex items-center text-sm font-medium capitalize transition ease-in-out duration-300
               {{ request()->routeIs($link['route']) ? 'text-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                <i class="{{ $link['icon'] }} text-xs mr-2"></i>
                {{ $link['label'] }}
            </a>
        @endforeach
        {{-- end links --}}

    </div>
    <!-- end sidebar content -->

</div>
<!-- end sidebar -->