<html>
<head>
<script type="text/javascript">
function exibeOutros(){
  if (document.getElementById("timetorce").value == "outro")
    document.getElementById("outrotime").visibility = visible;
  else
    document.getElementById("outrotime").visible = hidden;
}
</script>
<title> Cadastro de Cliente </title>
</head>
<body>
<form method="POST" action="cadastrocliente.php">
<label>Fisico</label><input type="radio" name="tipo" value="F" id="tipo"><br>
<label>Juridico</label><input type="radio" name="tipo" value="J" id="tipo"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Enreceço:</label><input type="text" name="nome" id="senha"><br>
<label>Numero:</label><input type="text" name="nome" id="senha"><br>
<label>Complemento:</label><input type="text" name="nome" id="senha"><br>
<label>Cidade:</label><input type="text" name="nome" id="senha"><br>
<label>Bairro:</label><input type="text" name="nome" id="senha"><br>
<label>Estado:</label><input type="text" name="nome" id="senha"><br>
<label>Pais:</label><input type="text" name="nome" id="senha"><br>
<label>CEP:</label><input type="text" name="nome" id="senha"><br>
<label>Fone:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>
<label>Nome:</label><input type="text" name="nome" id="senha"><br>


<input type = "radio" name = "timetorce" id="timetorce" value = "outro" style="margin-top:15px;" onclick="exibeOutros()"/> Outros
<input type="text" id="outrotime" value=""/>

<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
</form>
</body>
</html>

