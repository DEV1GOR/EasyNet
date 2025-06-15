<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
            Nome do Plano:
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nome') border-red-500 @enderror"
               id="nome" type="text" name="nome" placeholder="Ex: Fibra 100 Mega"
               value="{{ old('nome', $plano->nome ?? '') }}" required>
        @error('nome')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="velocidade_download_mbps">
            Velocidade Download (Mbps):
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('velocidade_download_mbps') border-red-500 @enderror"
               id="velocidade_download_mbps" type="number" name="velocidade_download_mbps" placeholder="Ex: 100"
               value="{{ old('velocidade_download_mbps', $plano->velocidade_download_mbps ?? '') }}">
        @error('velocidade_download_mbps')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="velocidade_upload_mbps">
            Velocidade Upload (Mbps):
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('velocidade_upload_mbps') border-red-500 @enderror"
               id="velocidade_upload_mbps" type="number" name="velocidade_upload_mbps" placeholder="Ex: 50"
               value="{{ old('velocidade_upload_mbps', $plano->velocidade_upload_mbps ?? '') }}">
        @error('velocidade_upload_mbps')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="valor_mensal">
            Valor Mensal:
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('valor_mensal') border-red-500 @enderror"
               id="valor_mensal" type="number" step="0.01" name="valor_mensal" placeholder="Ex: 99.90"
               value="{{ old('valor_mensal', $plano->valor_mensal ?? '') }}" required>
        @error('valor_mensal')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="descricao">
            Descrição:
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('descricao') border-red-500 @enderror"
                  id="descricao" name="descricao" rows="3" placeholder="Detalhes do plano...">{{ old('descricao', $plano->descricao ?? '') }}</textarea>
        @error('descricao')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="ativo">
            Status:
        </label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('ativo') border-red-500 @enderror"
                id="ativo" name="ativo">
            <option value="1" {{ old('ativo', $plano->ativo ?? 1) == 1 ? 'selected' : '' }}>Ativo</option>
            <option value="0" {{ old('ativo', $plano->ativo ?? 1) == 0 ? 'selected' : '' }}>Inativo</option>
        </select>
        @error('ativo')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Salvar Plano
        </button>
        <a href="{{ route('planos.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
            Cancelar
        </a>
    </div>
</div>