<!-- nav -->
<nav class="w-full bg-white md:pt-0 px-6 relative border-t border-b border-gray-300">
    <div class="container mx-auto max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
        <div
                class="w-full md:w-3/4 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
            <a href="/"
               class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Home</a>
            <a href="{{ route('open.products.index') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Products </a>
            <a href="{{ route('open.garage-services.index') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Garage Services </a>
            <a href="{{ route('open.cars.index') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Cars</a>


            <a href="{{ route('products.index') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">
                @auth
                    @hasanyrole('admin')
                    Admin Paneel
                    @endhasanyrole
                @endauth
            </a>

        </div>
        <div class="w-full md:w-1/4 text-center md:text-right pb-4 md:p-0">
            <input type="search" placeholder="Search..." class="bg-gray-200 border text-sm p-1"/>
        </div>
    </div>
</nav>
<!-- /nav -->

