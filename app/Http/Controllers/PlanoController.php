<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 

class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pega todos os planos do banco de dados
        $planos = Plano::all();
        // Retorna a view 'planos.index' e passa os planos para ela
        return view('planos.index', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna a view com o formulário de criação
        return view('planos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Regras de validação para os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255|unique:planos,nome', // Nome único
            'velocidade_download_mbps' => 'nullable|integer|min:0',
            'velocidade_upload_mbps' => 'nullable|integer|min:0',
            'valor_mensal' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'ativo' => 'required|boolean',
        ]);

        // Cria um novo plano com os dados validados
        Plano::create($request->all());

        // Redireciona para a lista de planos com uma mensagem de sucesso
        return redirect()->route('planos.index')->with('success', 'Plano criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plano $plano)
    {
        // Retorna a view para exibir os detalhes de um plano específico
        return view('planos.show', compact('plano'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plano $plano)
    {
        // Retorna a view com o formulário de edição e passa o plano a ser editado
        return view('planos.edit', compact('plano'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plano $plano)
    {
        // Regras de validação para a atualização (o nome pode ser o mesmo do plano atual)
        $request->validate([
            'nome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('planos')->ignore($plano->id), // Ignora o próprio ID ao verificar unicidade
            ],
            'velocidade_download_mbps' => 'nullable|integer|min:0',
            'velocidade_upload_mbps' => 'nullable|integer|min:0',
            'valor_mensal' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'ativo' => 'required|boolean',
        ]);

        // Atualiza o plano com os dados validados
        $plano->update($request->all());

        // Redireciona para a lista de planos com uma mensagem de sucesso
        return redirect()->route('planos.index')->with('success', 'Plano atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plano $plano)
    {
        // Marca o plano como inativo em vez de deletar fisicamente, para evitar problemas com clientes
        $plano->update(['ativo' => false]);
        // Ou, se você quiser deletar de verdade:
        // $plano->delete();

        // Redireciona para a lista de planos com uma mensagem de sucesso
        return redirect()->route('planos.index')->with('success', 'Plano desativado/excluído com sucesso!');
    }
}