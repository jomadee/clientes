<?php
/**
*
* Aplicativo de Clientes | lliure 6.x
*
* @versão 4.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

switch(isset($_GET['ac']) ? : 'erro'){
case 'new':
	echo jf_insert(PREFIXO.'clientes', array('nome' => 'Novo cliente'));
	
	break;
	
case 'erro':		
	break;
}
?>