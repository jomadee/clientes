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

	

switch(isset($_GET['ac'])? $_GET['ac'] : ""){
case 'write':
	require_once("../../etc/bdconf.php"); 
	require_once("../../includes/jf.funcoes.php"); 
	
	$dirFoto = 	"../../../uploads/clientes/";		
	
	$retorno = jf_form_actions('salvar', 'salvar-editar');
	
	if(!empty($_FILES['imagem']['name'])){
		$arquivo = $_FILES['imagem'];
		
		$imagemNome = explode('.', $arquivo['name']);
		$extenc = array_pop($imagemNome);
		$imagemNome = join(".", $imagemNome);
		$imagemNome = jf_urlformat($imagemNome);
		$imagemNome = $imagemNome.'_'.substr(md5(time()), rand(0, 20), 8).'.'.$extenc;	
		
		if(isset($_POST['fotoant']))
			unlink($dirFoto.$_POST['fotoant']);

		move_uploaded_file($arquivo["tmp_name"],  $dirFoto.$imagemNome);
		$_POST['imagem'] = $imagemNome;
	}
	
	if(isset($_POST['fotoant']))
		unset($_POST['fotoant']);
		
	jf_update(PREFIXO.'clientes', $_POST, array('id' => $_GET['id']));
	
	$_SESSION['aviso'] = array('Cliente alterado com sucesso!', 1);
	
	switch ($retorno){
		case 'salvar':
			$retorno = '../../index.php?app=clientes';
		break;
		
		case 'salvar-editar':
			$retorno = '../../index.php?app=clientes&acoes=editar&id='.$_GET['id'];
		break;
	}
	
	header('location: '.$retorno);
break;

default:
	$id = $_GET['id'];
	$consulta = "select * from ".$llAppTable." where id like ".$id;
	
	$query = mysql_query($consulta);
	if(mysql_num_rows($query) > 0){
		$dados = mysql_fetch_array($query);
		
		extract($dados);
				
		$endComun = $pluginHome."&acoes=editar&id=".$id;
				
		?>
		
		<div class="boxCenter">
			<form method="post" action="<?php echo $pluginPasta.'step.php?ac=write&amp;id='.$_GET['id']?>" class="form" enctype="multipart/form-data">
				<fieldset>
					<div>
						<label>Nome</label>
						<div class="input"><input type="text" maxlength="50" value="<?php echo $nome?>" name="nome" /></div>
					</div>

					<div>
						<label>Url</label>
						<div class="input"><input type="text" maxlength="50" value="<?php echo $url?>" name="url" /></div>
						<span class="ex">Link para o web site do cliente, é essencial que a url inicie com "http://". <strong>Campo opcional</strong></span>
					</div>					

					<?php
					if(empty($imagem)){
						?>
						<div>
							<label>Logo do cliente</label>
							<input type="file" name="imagem" />
							<span class="ex">Selecione a foto referente ao logo do cliente, ela poderá ser alterada posteriormente.</span>
						</div>	
						<?php
					} else {
							?>
						<div>
							<label>Logo do cliente</label>
							<img src="includes/thumb.php?i=../../uploads/clientes/<?php echo $imagem?>:100" alt=""/>
							<input type="file" name="imagem" />
							<span class="ex">Selecio uma nova foto para esse produto, ela poderá ser alterada posteriormente.</span>			
							<input name="fotoant" type="hidden" value="<?php echo $imagem?>" />
						</div>	
						<?php
					}
					?>	
				</fieldset>
				<div class="botoes">
					<button type="submit" name="salvar" class="confirm" title="Salva e volta para lsitagem de produtos">Salvar</button>
					<button  type="submit" name="salvar-editar" title="Salva e continua nesta mesma tela">Salvar e continuar editando</button>
					<a href="<?php echo $backReal?>" title="voltar">Voltar</a>			
				</div>
		
			</form>
		</div>
	<?php
	} 
break;
}
?>
