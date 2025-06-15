<x-app-layout>
    {{-- Opcional: Este é o 'header' que aparecerá abaixo da navegação principal --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestão de Planos de Internet') }}
        </h2>
    </x-slot>

    {{-- Este é o conteúdo principal que será injetado no $slot do layouts/app.blade.php --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- SEU CONTEÚDO ORIGINAL DE planos/index.blade.php COMEÇA AQUI --}}
                    <h1 class="text-2xl font-bold mb-6">Lista de Planos de Internet</h1>

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('planos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Adicionar Novo Plano
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
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Nome do Plano</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Download (Mbps)</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Upload (Mbps)</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Valor Mensal</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Status</th>
                                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($planos as $plano)
                                    <tr>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $plano->id }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $plano->nome }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $plano->velocidade_download_mbps }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">{{ $plano->velocidade_upload_mbps }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">R$ {{ number_format($plano->valor_mensal, 2, ',', '.') }}</td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $plano->ativo ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                                {{ $plano->ativo ? 'Ativo' : 'Inativo' }}
                                            </span>
                                        </td>
                                        <td class="border-dashed border-t border-gray-200 py-2 px-3">
                                            <a href="{{ route('planos.edit', $plano->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                            <form action="{{ route('planos.destroy', $plano->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este plano? Esta ação pode impactar clientes vinculados.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">Nenhum plano cadastrado ainda.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- SEU CONTEÚDO ORIGINAL DE planos/index.blade.php TERMINA AQUI --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>