<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Plano de Internet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Editar Plano: {{ $plano->nome }}</h1>

                    <form action="{{ route('planos.update', $plano->id) }}" method="POST">
                        @method('PUT') {{-- Laravel exige PUT/PATCH para atualizações --}}
                        @include('planos.form') {{-- Inclui o formulário reutilizável --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>