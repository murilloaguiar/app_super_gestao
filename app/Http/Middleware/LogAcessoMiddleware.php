<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LogAcesso;


class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //request - manipular
        //return $next($request); //envia a requisição para a aplicação
        //response - manipular
        //dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=>"IP $ip requisitou a rota $rota"]);

        //return $next($request);

        $resposta = $next($request);

        //$resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados!'); //modificando o status code e status text

        return $resposta;
        //dd($resposta);

        //return Response('Chegamos no middleware e finalizamos no próprio middleware'); //formando um objeto de resposta
    }
}
