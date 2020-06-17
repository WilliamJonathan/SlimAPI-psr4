<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Carga;
// Rotas para produtos
$app->group('/api/v1', function() {

	//busca roteiro de entregas em aberto para o motorista logado
	$this->get('/lista/roteiros/entregas/{codigo}', function($request, $response, $args){
		$roteiros = Carga::where('crg_motorista', '=', $args['codigo'])->where('crg_situacao', '<>', 'C')->get();
		return $response->withJson($roteiros);
		//return $response->withJson(['nome'=> 'Moto G']);

	});

	//Conclui o roteiro com canhoto da nota assinado
	$this->post('/altera/roteiros/entregas/concluido', function($request, $response){
		$dados = $request->getParsedBody();
		$id = $dados['crg_numero'] ?? null;
		
		$roteiros = Carga::where('crg_numero', $id)->first()->update($dados);
		return $response->withJson($roteiros);
	});


});