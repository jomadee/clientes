<?php
/**
*
* Aplicativo de Clientes
*
* @Vers�o 5
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @licen�a http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$pluginHome = "?app=clientes";
$pluginPasta = "app/clientes/";
$llAppTable = PREFIXO."clientes";


$botoes = array(
	array('href' => $backReal, 'fa' => 'fa-chevron-left', 'title' => $backNome)
	);

if(!isset($_GET['id']))
	$botoes[] = array('href' => $_ll['app']['onserver'].'&ac=new', 'fa' => 'fa-user', 'title' => 'Adicionar cliente', 'attr' => 'class="criar"');

echo app_bar('Administra��o de clientes', $botoes);

if(isset($_GET['acoes'])){
	require_once('step.php');
} else {
	require_once('home.php');
}
?>

<script>
	$('.criar').click( function(){
		ll_load($(this).attr('href'), function(){
			jfAlert('Cliente criado com sucesso');
			navigi_start();
		});
		
		return false;
	});
</script>