<?php
/**
*
* Aplicativo de Clientes | lliure 6.x
*
* @Versão 4.1
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$pluginHome = "?app=clientes";
$pluginPasta = "app/clientes/";
$llAppTable = PREFIXO."clientes";


$botoes = array(
	array('href' => $backReal, 'img' => $plgIcones.'br_prev.png', 'title' => $backNome)
	);

if(!isset($_GET['id']))
	$botoes[] = array('href' => $_ll['app']['onserver'].'&ac=new', 'img' => $plgIcones.'user.png', 'title' => 'Adicionar cliente', 'attr' => 'class="criar"');

echo app_bar('Administração de clientes', $botoes);

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