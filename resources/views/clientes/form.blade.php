<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Informações Pessoais/Contrato --}}
        <div>
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Dados do Cliente</h3>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nome_completo">
                    Nome Completo:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nome_completo') border-red-500 @enderror"
                       id="nome_completo" type="text" name="nome_completo" placeholder="Nome completo do cliente"
                       value="{{ old('nome_completo', $cliente->nome_completo ?? '') }}" required>
                @error('nome_completo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cpf_cnpj">
                    CPF/CNPJ:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('cpf_cnpj') border-red-500 @enderror"
                       id="cpf_cnpj" type="text" name="cpf_cnpj" placeholder="000.000.000-00 ou 00.000.000/0000-00"
                       value="{{ old('cpf_cnpj', $cliente->cpf_cnpj ?? '') }}" required>
                @error('cpf_cnpj')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rg">
                    RG:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('rg') border-red-500 @enderror"
                       id="rg" type="text" name="rg" placeholder="Opcional"
                       value="{{ old('rg', $cliente->rg ?? '') }}">
                @error('rg')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="data_nascimento">
                    Data de Nascimento:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('data_nascimento') border-red-500 @enderror"
                       id="data_nascimento" type="date" name="data_nascimento"
                       value="{{ old('data_nascimento', $cliente->data_nascimento ?? '') }}">
                @error('data_nascimento')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telefone_principal">
                    Telefone Principal (WhatsApp):
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telefone_principal') border-red-500 @enderror"
                       id="telefone_principal" type="text" name="telefone_principal" placeholder="(XX) XXXXX-XXXX"
                       value="{{ old('telefone_principal', $cliente->telefone_principal ?? '') }}" required>
                @error('telefone_principal')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telefone_secundario">
                    Telefone Secundário:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telefone_secundario') border-red-500 @enderror"
                       id="telefone_secundario" type="text" name="telefone_secundario" placeholder="(XX) XXXXX-XXXX (Opcional)"
                       value="{{ old('telefone_secundario', $cliente->telefone_secundario ?? '') }}">
                @error('telefone_secundario')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    E-mail:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                       id="email" type="email" name="email" placeholder="email@exemplo.com"
                       value="{{ old('email', $cliente->email ?? '') }}" required>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Endereço e Contrato --}}
        <div>
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Dados de Endereço e Contrato</h3>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rua">
                    Rua:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('rua') border-red-500 @enderror"
                       id="rua" type="text" name="rua" placeholder="Nome da rua"
                       value="{{ old('rua', $cliente->rua ?? '') }}" required>
                @error('rua')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="numero">
                    Número:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('numero') border-red-500 @enderror"
                       id="numero" type="text" name="numero" placeholder="Número da casa/apartamento"
                       value="{{ old('numero', $cliente->numero ?? '') }}">
                @error('numero')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="bairro">
                    Bairro:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('bairro') border-red-500 @enderror"
                       id="bairro" type="text" name="bairro" placeholder="Nome do bairro"
                       value="{{ old('bairro', $cliente->bairro ?? '') }}" required>
                @error('bairro')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cidade">
                    Cidade:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('cidade') border-red-500 @enderror"
                       id="cidade" type="text" name="cidade" placeholder="Cidade"
                       value="{{ old('cidade', $cliente->cidade ?? 'Palmares') }}" required>
                @error('cidade')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="estado">
                    Estado (UF):
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('estado') border-red-500 @enderror"
                       id="estado" type="text" name="estado" maxlength="2" placeholder="Ex: PE"
                       value="{{ old('estado', $cliente->estado ?? 'PE') }}" required>
                @error('estado')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cep">
                    CEP:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('cep') border-red-500 @enderror"
                       id="cep" type="text" name="cep" placeholder="00000-000 (Opcional)"
                       value="{{ old('cep', $cliente->cep ?? '') }}">
                @error('cep')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="complemento">
                    Complemento/Referência:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('complemento') border-red-500 @enderror"
                       id="complemento" type="text" name="complemento" placeholder="Apto, Bloco, Próximo a..."
                       value="{{ old('complemento', $cliente->complemento ?? '') }}">
                @error('complemento')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="plano_id">
                    Plano de Internet:
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('plano_id') border-red-500 @enderror"
                        id="plano_id" name="plano_id" required>
                    <option value="">Selecione um plano</option>
                    @foreach ($planos as $plano) {{-- $planos virá do controller --}}
                        <option value="{{ $plano->id }}" {{ old('plano_id', $cliente->plano_id ?? '') == $plano->id ? 'selected' : '' }}>
                            {{ $plano->nome }} (R$ {{ number_format($plano->valor_mensal, 2, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('plano_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="data_inicio_contrato">
                    Data Início Contrato:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('data_inicio_contrato') border-red-500 @enderror"
                       id="data_inicio_contrato" type="date" name="data_inicio_contrato"
                       value="{{ old('data_inicio_contrato', $cliente->data_inicio_contrato ?? date('Y-m-d')) }}" required>
                @error('data_inicio_contrato')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                    Status do Cliente:
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror"
                        id="status" name="status">
                    <option value="ativo" {{ old('status', $cliente->status ?? 'ativo') == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="suspenso" {{ old('status', $cliente->status ?? 'ativo') == 'suspenso' ? 'selected' : '' }}>Suspenso</option>
                    <option value="cancelado" {{ old('status', $cliente->status ?? 'ativo') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="observacoes">
                    Observações:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('observacoes') border-red-500 @enderror"
                          id="observacoes" name="observacoes" rows="3" placeholder="Informações adicionais sobre o cliente...">{{ old('observacoes', $cliente->observacoes ?? '') }}</textarea>
                @error('observacoes')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mt-6">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Salvar Cliente
        </button>
        <a href="{{ route('clientes.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
            Cancelar
        </a>
    </div>
</div>