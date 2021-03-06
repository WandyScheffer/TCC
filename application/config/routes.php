<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//padrão
$route['default_controller'] = 'inicial_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//paginas de acesso geral
$route['catalogo'] = 'acessogeral/catalogo_controller';
$route['informacoes'] = 'acessogeral/informacoes_controller';
$route['login'] = 'acessogeral/login_controller';
$route['sobre'] = 'acessogeral/sobre_controller';
$route['logar']= 'acessogeral/login_controller/logar';

//infos
$route['informacoes/p'] = 'acessogeral/informacoes_controller';
$route['informacoes/p/(:num)'] = 'acessogeral/informacoes_controller';

//referentes ao catalogo
$route['catalogo/p'] = 'acessogeral/catalogo_controller';
$route['catalogo/p/(:num)'] = 'acessogeral/catalogo_controller';

//paginas quando logado
$route['deslogar'] = 'acessogeral/login_controller/deslogar';

//cadastro de livros
$route['cad_livro'] = 'acessofuncionarios/manuseialivro_controller';
$route['cadastrar_livro'] = 'acessofuncionarios/manuseialivro_controller/cadastrandolivro';

//cadastros extras do livro
$route['cad_referente_livro/(:num)'] = 'acessofuncionarios/manuseialivro_controller/cadAutorGenero';
$route['cadastrando_referente/(:num)'] = 'acessofuncionarios/manuseialivro_controller/cadastrandoReferente';

//edit livros
// $route['edit_livro'] = 'acessofuncionarios/manuseialivro_controller/edit';//acho q essa vai sair fora-----------------
$route['edit_livro/(:num)'] = 'acessofuncionarios/manuseialivro_controller/edit';
$route['editar_livro/(:num)'] = 'acessofuncionarios/manuseialivro_controller/editando';


//sobre conteudos
$route['cad_conteudos'] = 'acessofuncionarios/cadconteudo_controller';
$route['multa'] = 'acessofuncionarios/cadconteudo_controller/atualizamulta';
$route['atualiza_sobre'] = 'acessofuncionarios/cadconteudo_controller/atualizasobre';
$route['cad_info'] = 'acessofuncionarios/cadconteudo_controller/cadastranoticia';


//catalogo pesquisa like
$route['pesquisa'] = 'acessogeral/catalogo_controller/pesquisaLike';

$route['pesquisa/p'] = 'acessogeral/catalogo_controller/pesquisaLike';
$route['pesquisa/p/(:num)'] = 'acessogeral/catalogo_controller/pesquisaLike';

//catalogo pesquisa filtro
$route['filtro'] = 'acessogeral/catalogo_controller/filtro';

$route['filtro/p'] = 'acessogeral/catalogo_controller/filtro';
$route['filtro/p/(:num)'] = 'acessogeral/catalogo_controller/filtro';

//cad users
$route['cad_users'] = 'acessofuncionarios/manuseiausers_controller';
$route['cadastrar'] = 'acessofuncionarios/manuseiausers_controller/cadastrar';

//pesquisa de usuários
$route['pes_users'] = 'acessofuncionarios/manuseiausers_controller/mostra';
$route['pes_users/p'] = 'acessofuncionarios/manuseiausers_controller/mostra';
$route['pes_users/p/(:num)'] = 'acessofuncionarios/manuseiausers_controller/mostra';

$route['pesquisa_users'] = 'acessofuncionarios/manuseiausers_controller/pesquisauser';
$route['pesquisa_users/p'] = 'acessofuncionarios/manuseiausers_controller/pesquisauser';
$route['pesquisa_users/p/(:num)'] = 'acessofuncionarios/manuseiausers_controller/pesquisauser';

//edit users
$route['edit_user/(:num)'] = 'acessofuncionarios/manuseiausers_controller/editar';
$route['edicao_user/(:num)'] = 'acessofuncionarios/manuseiausers_controller/edicao';
$route['edit_status/(:num)/(:num)'] = 'acessofuncionarios/manuseiausers_controller/mudastatus';

//pagina do livro
$route['pagina_livro/(:num)'] = 'pagelivro_controller';
$route['pagina_livro/(:num)/p/(:num)'] = 'pagelivro_controller';
$route['pagina_livro/(:num)/p'] = 'pagelivro_controller';

//locacoes
$route['locacoes'] = 'acessofuncionarios/locacao_controller';
$route['locacoes/lista'] = 'acessofuncionarios/locacao_controller/lista';
$route['locacoes/lista/p'] = 'acessofuncionarios/locacao_controller/lista';
$route['locacoes/lista/p/(:num)'] = 'acessofuncionarios/locacao_controller/lista';
$route['locando'] = 'acessofuncionarios/locacao_controller/locando';
$route['manuseia_locacao'] = 'acessofuncionarios/locacao_controller/manuseialocacao';

//mensagem
$route['mensagens'] = 'msgusuario_controller';
$route['enviando'] = 'msgusuario_controller/enviando';
$route['lido/(:num)'] = 'msgusuario_controller/lendo';
$route['analisa/(:num)/(:num)'] = 'msgusuario_controller/analisaComent';

//perfil
$route['perfil'] = 'acessolocadores/pagelocador_controller';
$route['perfil/p'] = 'acessolocadores/pagelocador_controller';
$route['perfil/p/(:num)'] = 'acessolocadores/pagelocador_controller';
$route['renovar/(:num)'] = 'acessolocadores/pagelocador_controller/renovando';