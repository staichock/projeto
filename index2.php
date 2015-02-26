<?php 
	include "menu.php";
	//include "teste2.php";
?>
<!-- body>
<form method="POST" action="cadastrocliente.php">
<label>Nome</label><input type="radio" name="tipo" value="F" id="tipo"><br>
<label>CPF</label><input type="radio" name="tipo" value="J" id="tipo"><br>
<label>RG:</label><input type="text" name="nome" id="senha"><br>
<label>Enreceço:</label><input type="text" name="nome" id="senha"><br>
<label>Numero:</label><input type="text" name="nome" id="senha"><br>
<label>Complemento:</label><input type="text" name="nome" id="senha"><br>
</form>
</body>
-->
<!-- 

<form action="" method="post" name="menuForm">
     <select name="select_carros" onchange="document.forms['menuForm'].submit();">
         <option value="0">Escolha a Opcao</option>
          <option value="formuser.php">Fisico</option>
          <option value="2" <?php /*echo isset($_POST['select_carros']) && $_POST['select_carros']==2?' selected="selected"':'';?>>Carro 2</option>
          <option value="3" <?php echo isset($_POST['select_carros']) && $_POST['select_carros']==3?' selected="selected"':'';*/?>>Carro 3</option>
          <option>Fisico</option>
     </select>
</form>
-->
 <?php
/*function formulario() {
	?>
	<form name="form1">
	<label>Nome:</label><input type="text" name="nome" id="senha"><br>
	<input type="
	</form>
	<?php 
}

?>

<!-- <form name="form1">

	
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
</form>
-->
<?php
    if(isset($_POST['select_carros']))
    {
         echo $_POST['select_carros'];
    }*/
?>