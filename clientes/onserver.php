<?php
/**
*
* Aplicativo de Clientes | lliure 6.x
*
* @Vers�o 4.1
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @licen�a http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

switch(isset($_GET['ac']) ? $_GET['ac'] : 'erro'){
case 'new':
	echo jf_insert(PREFIXO.'clientes', array('nome' => 'Novo cliente'));	
	break;
	
case 'erro':		
	break;
}
?>