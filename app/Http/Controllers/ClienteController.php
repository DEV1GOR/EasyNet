<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Plano; // Importar o modelo Plano
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon; // Para manipulação de datas

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pega todos os clientes do banco de dados, com o plano relacionado
        $clientes = Cliente::with('plano')->orderBy('nome_completo')->get();
        // Retorna a view 'clientes.index' e passa os clientes para ela
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pega todos os planos ativos para preencher o select box no formulário
        $planos = Plano::where('ativo', true)->orderBy('nome')->get();
        // Retorna a view com o formulário de criação
        return view('clientes.create', compact('planos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plano_id' => 'required|exists:planos,id',
            'nome_completo' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|max:20|unique:clientes,cpf_cnpj',
            'rg' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'rua' => 'required|string|max:255',
            'numero' => 'nullable|string|max:50',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'cep' => 'nullable|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'telefone_principal' => 'required|string|max:20',
            'telefone_secundario' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:clientes,email',
            'data_inicio_contrato' => 'required|date',
            'status' => 'required|in:ativo,suspenso,cancelado',
            'observacoes' => 'nullable|string',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        // Retorna a view para exibir os detalhes de um cliente específico
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        // Pega todos os planos ativos para preencher o select box no formulário
        $planos = Plano::where('ativo', true)->orderBy('nome')->get();
        // Retorna a view com o formulário de edição e passa o cliente a ser editado
        return view('clientes.edit', compact('cliente', 'planos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'plano_id' => 'required|exists:planos,id',
            'nome_completo' => 'required|string|max:255',
            'cpf_cnpj' => [
                'required',
                'string',
                'max:20',
                Rule::unique('clientes')->ignore($cliente->id), // Ignora o próprio ID
            ],
            'rg' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'rua' => 'required|string|max:255',
            'numero' => 'nullable|string|max:50',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'cep' => 'nullable|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'telefone_principal' => 'required|string|max:20',
            'telefone_secundario' => 'nullable|string|max:20',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('clientes')->ignore($cliente->id), // Ignora o próprio ID
            ],
            'data_inicio_contrato' => 'required|date',
            'status' => 'required|in:ativo,suspenso,cancelado',
            'observacoes' => 'nullable|string',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     * Neste caso, vamos usar para mudar o status entre ativo/suspenso.
     */
    public function destroy(Cliente $cliente)
    {
        // Alternar o status entre 'ativo' e 'suspenso'
        $novoStatus = ($cliente->status == 'ativo') ? 'suspenso' : 'ativo';
        $mensagem = ($novoStatus == 'suspenso') ? 'Cliente suspenso com sucesso!' : 'Cliente reativado com sucesso!';

        $cliente->update(['status' => $novoStatus]);

        return redirect()->route('clientes.index')->with('success', $mensagem);
        // Se você quisesse a exclusão definitiva (soft delete), seria:
        // $cliente->delete();
        // return redirect()->route('clientes.index')->with('success', 'Cliente excluído (soft delete) com sucesso!');
    }
}