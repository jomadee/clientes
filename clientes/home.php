<?php
/**
*
* Aplicativo de Clientes | lliure 6.x
*
* @vers�o 4.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @licen�a http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$navegador = new navigi();
$navegador->tabela = $llAppTable;
$navegador->query = 'select * from '.$llAppTable.' order by nome asc' ;

$navegador->delete = true;
$navegador->rename = true;		

$navegador->config = array(	'link' => $llAppHome.'&amp;acoes=editar&amp;id=');

$navegador->monta();
?>