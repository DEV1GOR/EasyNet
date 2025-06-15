<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestão de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Lista de Clientes</h1>

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('clientes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Adicionar Novo Cliente
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                            <thead>
                                <tr class="text-left">
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">ID</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Nome Completo</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">CPF/CNPJ</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Plano</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Telefone</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Status</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clientes as $cliente)
                                    <tr>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $cliente->id }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $cliente->nome_completo }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $cliente->cpf_cnpj }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $cliente->plano->nome ?? 'N/A' }}</td> {{-- Acessa o nome do plano --}}
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $cliente->telefone_principal }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                                @if ($cliente->status == 'ativo') bg-green-200 text-green-800
                                                @elseif ($cliente->status == 'suspenso') bg-yellow-200 text-yellow-800
                                                @else bg-red-200 text-red-800 @endif">
                                                {{ ucfirst($cliente->status) }}
                                            </span>
                                        </td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">
                                            <a href="{{ route('clientes.show', $cliente->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Ver</a>
                                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja mudar o status deste cliente para '{{ $cliente->status == 'ativo' ? 'suspenso' : 'ativo' }}'?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    {{ $cliente->status == 'ativo' ? 'Suspender' : 'Ativar' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">Nenhum cliente cadastrado ainda.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>