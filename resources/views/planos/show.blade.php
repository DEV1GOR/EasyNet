<x-app-layout>
    {{-- Opcional: Este é o 'header' que aparecerá abaixo da navegação principal --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Plano de Internet') }}
        </h2>
    </x-slot>

    {{-- Este é o conteúdo principal que será injetado no $slot do layouts/app.blade.php --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- SEU CONTEÚDO ORIGINAL DE planos/show.blade.php COMEÇA AQUI --}}
                    <h1 class="text-2xl font-bold mb-6">Detalhes do Plano: {{ $plano->nome }}</h1>

                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Nome:</p>
                            <p class="text-gray-900 text-lg">{{ $plano->nome }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Velocidade Download:</p>
                            <p class="text-gray-900 text-lg">{{ $plano->velocidade_download_mbps }} Mbps</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Velocidade Upload:</p>
                            <p class="text-gray-900 text-lg">{{ $plano->velocidade_upload_mbps }} Mbps</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Valor Mensal:</p>
                            <p class="text-gray-900 text-lg">R$ {{ number_format($plano->valor_mensal, 2, ',', '.') }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Descrição:</p>
                            <p class="text-gray-900 text-lg">{{ $plano->descricao ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Status:</p>
                            <p class="text-gray-900 text-lg">{{ $plano->ativo ? 'Ativo' : 'Inativo' }}</p>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('planos.edit', $plano->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Editar Plano
                            </a>
                            <a href="{{ route('planos.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Voltar para a Lista
                            </a>
                        </div>
                    </div>
                    {{-- SEU CONTEÚDO ORIGINAL DE planos/show.blade.php TERMINA AQUI --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>