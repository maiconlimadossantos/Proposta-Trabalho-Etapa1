<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilTituloRequest;
use App\Models\Perfil;
use App\Models\PerfilTitulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PerfilTituloController extends Controller
{
    // 1. Listagem de Vínculos (Histórico/Avaliações)
    public function index()
    {
        $perfiltitulo = PerfilTitulo::with('perfil')->get();

        // Para exibição na listagem, vamos buscar os nomes reais de forma dinâmica e segura
        foreach ($perfiltitulo as $item) {
            $item->titulo_nome = 'Desconhecido';
            $item->tipo_midia = 'N/A';

            if ($item->flime_id && DB::table('_filmes_da_tabela')->where('id', $item->flime_id)->exists()) {
                $item->titulo_nome = DB::table('_filmes_da_tabela')->find($item->flime_id)->nome ?? 'Filme';
                $item->tipo_midia = 'Filme';
            } elseif ($item->anime_id && DB::table('_animes_da_tabela')->where('id', $item->anime_id)->exists()) {
                $item->titulo_nome = DB::table('_animes_da_tabela')->find($item->anime_id)->nome ?? 'Anime';
                $item->tipo_midia = 'Anime';
            } elseif ($item->novela_id && DB::table('_novelas_da_tabela')->where('id', $item->novela_id)->exists()) {
                $item->titulo_nome = DB::table('_novelas_da_tabela')->find($item->novela_id)->nome ?? 'Novela';
                $item->tipo_midia = 'Novela';
            } elseif ($item->serie_id && DB::table('_series_da_tabela')->where('id', $item->serie_id)->exists()) {
                $item->titulo_nome = DB::table('_series_da_tabela')->find($item->serie_id)->nome ?? 'Série';
                $item->tipo_midia = 'Série';
            }
        }

        return view('profile_titles.index', compact('profileTitles'));
    }

    // 2. Tela de Adicionar Vínculo
    public function create()
    {
        $perfils = Perfil::all();

        // Coleta os conteúdos das tabelas do catálogo se elas já possuírem dados cadastrados
        $filmes = DB::table('_filmes_da_tabela')->get();
        $animes = DB::table('_animes_da_tabela')->get();
        $novelas = DB::table('_novelas_da_tabela')->get();
        $series = DB::table('_series_da_tabela')->get();

        return view('profile_titles.create', compact('profiles', 'filmes', 'animes', 'novelas', 'series'));
    }

    // Ação de Salvar no Banco
    public function store(PerfilTituloRequest $request)
    {


        $data = [
            'perfil_id' => $request->perfil_id,
            'assistido' => $request->has('assistido'),
            'avaliacao' => $request->avaliacao,
            'flime_id' => null,
            'anime_id' => null,
            'novela_id' => null,
            'serie_id' => null,
        ];

        // Vincula dinamicamente com base no tipo escolhido no formulário
        if ($request->tipo_conteudo === 'filme') $data['flime_id'] = $request->conteudo_id;
        if ($request->tipo_conteudo === 'anime') $data['anime_id'] = $request->conteudo_id;
        if ($request->tipo_conteudo === 'novela') $data['novela_id'] = $request->conteudo_id;
        if ($request->tipo_conteudo === 'serie') $data['serie_id'] = $request->conteudo_id;

        PerfilTitulo::create($data);

        return redirect()->route('profile-titles.index')->with('success', 'Vínculo de título salvo com sucesso!');
    }

    // 3. Tela de Editar Vínculo
    public function edit($id)
    {
        $perfiltitulo = PerfilTitulo::findOrFail($id);
        $perfils = Perfil::all();

        // Determina qual era o conteúdo previamente selecionado
        $perfiltitulo->tipo_conteudo = '';
        $perfiltitulo->conteudo_id = null;

        if ($perfiltitulo->flime_id) { $perfiltitulo->tipo_conteudo = 'filme'; $perfiltitulo->conteudo_id = $perfiltitulo->flime_id; }
        elseif ($perfiltitulo->anime_id) { $perfiltitulo->tipo_conteudo = 'anime'; $perfiltitulo->conteudo_id = $perfiltitulo->anime_id; }
        elseif ($perfiltitulo->novela_id) { $perfiltitulo->tipo_conteudo = 'novela'; $perfiltitulo->conteudo_id = $perfiltitulo->novela_id; }
        elseif ($perfiltitulo->serie_id) { $perfiltitulo->tipo_conteudo = 'serie'; $perfiltitulo->conteudo_id = $perfiltitulo->serie_id; }

        $filmes = DB::table('_filmes_da_tabela')->get();
        $animes = DB::table('_animes_da_tabela')->get();
        $novelas = DB::table('_novelas_da_tabela')->get();
        $series = DB::table('_series_da_tabela')->get();

        return view('profile_titles.edit', compact('profileTitle', 'profiles', 'filmes', 'animes', 'novelas', 'series'));
    }

    // Ação de Atualizar no Banco
    public function update(PerfilTituloRequest $request, $id)
    {
        $perfiltitulo = PerfilTitulo::findOrFail($id);



        $data = [
            'perfil_id' => $request->perfil_id,
            'assistido' => $request->has('assistido'),
            'avaliacao' => $request->avaliacao,
            'flime_id' => null,
            'anime_id' => null,
            'novela_id' => null,
            'serie_id' => null,
        ];

        if ($request->tipo_conteudo === 'filme') $data['flime_id'] = $request->conteudo_id;
        if ($request->tipo_conteudo === 'anime') $data['anime_id'] = $request->conteudo_id;
        if ($request->tipo_conteudo === 'novela') $data['novela_id'] = $request->conteudo_id;
        if ($request->tipo_conteudo === 'serie') $data['serie_id'] = $request->conteudo_id;

        $perfiltitulo->update($data);

        return redirect()->route('profile-titles.index')->with('success', 'Vínculo de título atualizado!');
    }

    // 4. Ação de Remover Vínculo
    public function destroy($id)
    {
        $perfiltitulo = PerfilTitulo::findOrFail($id);
        $perfiltitulo->delete();

        return redirect()->route('profile-titles.index')->with('success', 'Vínculo removido do histórico!');
    }
}