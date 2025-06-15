<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Detalhes do Cliente: {{ $cliente->nome_completo }}</h1>

                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Plano:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->plano->nome ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">CPF/CNPJ:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->cpf_cnpj }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">RG:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->rg ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Data Nasc.:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->data_nascimento ? \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') : 'N/A' }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Telefone Principal:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->telefone_principal }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Telefone Secundário:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->telefone_secundario ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">E-mail:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->email }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Endereço:</p>
                            <p class="text-gray-900 text-lg">
                                {{ $cliente->rua }}, {{ $cliente->numero ?? 'S/N' }} - {{ $cliente->bairro }}<br>
                                {{ $cliente->cidade }} - {{ $cliente->estado }}, {{ $cliente->cep ?? 'N/A' }}<br>
                                {{ $cliente->complemento ?? '' }}
                            </p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Início Contrato:</p>
                            <p class="text-gray-900 text-lg">{{ \Carbon\Carbon::parse($cliente->data_inicio_contrato)->format('d/m/Y') }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Status:</p>
                            <p class="text-gray-900 text-lg">{{ ucfirst($cliente->status) }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="block text-gray-700 text-sm font-bold mb-2">Observações:</p>
                            <p class="text-gray-900 text-lg">{{ $cliente->observacoes ?? 'N/A' }}</p>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Editar Cliente
                            </a>
                            <a href="{{ route('clientes.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
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