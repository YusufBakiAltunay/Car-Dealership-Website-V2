@extends('layouts.layoutpublic')

@section('content')

    <!-- HERO -->
    <section class="bg-gray-900 text-white py-24">
        <div class="container max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center">

            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Alles voor jouw auto
                </h1>

                <p class="text-gray-300 mb-6 text-lg">
                    Ontdek onze producten en professionele garage services
                    voor onderhoud, reparatie en upgrades van jouw auto.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('open.products.index') }}"
                       class="bg-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Bekijk producten
                    </a>

                    <a href="{{ route('open.cars.index') }}"
                       class="bg-blue-800 px-6 py-3 rounded-lg font-semibold hover:bg-blue-900 transition duration-300">
                        Bekijk auto's
                    </a>

                    <a href="{{ route('open.garage-services.index') }}"
                       class="bg-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition duration-300">
                        Garage services
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70"
                     class="rounded-lg shadow-lg w-full max-w-md">
            </div>

        </div>
    </section>

    <!-- GARAGE SERVICES -->
    <section class="bg-gray-100 py-16">
        <div class="container max-w-6xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-semibold mb-12">
                Onze garage services
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold mb-3">Onderhoud</h3>
                    <p class="text-gray-600">
                        Regelmatig onderhoud om jouw auto veilig en betrouwbaar te houden.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold mb-3">Reparatie</h3>
                    <p class="text-gray-600">
                        Snelle en professionele reparaties door ervaren monteurs.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold mb-3">Diagnose</h3>
                    <p class="text-gray-600">
                        Moderne apparatuur om problemen met jouw auto te vinden.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="bg-blue-600 py-20 text-white">
        <div class="container max-w-4xl mx-auto text-center px-6">

            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Maak een afspraak met onze garage
            </h2>

            <p class="mb-8 text-lg">
                Onze monteurs staan klaar om jouw auto weer perfect te laten rijden.
            </p>

            <a href="{{ route('open.garage-services.index') }}"
               class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                Plan afspraak
            </a>

        </div>
    </section>

@endsection