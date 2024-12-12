<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de novo usuário</title>

<style type="text/css">
body{
	font-family: Tahoma, Geneva, sans-serif;
}
.maintitle{
	font-size:36px;
	color:#285176;
	font-weight:bold;	
}

.left{
	color:#285176;
	text-align:right;
	padding-right:5px;
}

.rodape>a{
	color:#069;
}

</style>

</head>

<body>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" class="maintitle">Cadastro de novo usuário</td>
  </tr>
  <tr>
    <td width="104">&nbsp;</td>
    <td width="496">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="left">Login:</td>
    <td><?=$data['username']?></td>
  </tr>
  
  <tr>
    <td class="left">E-mail:</td>
    <td><a href="mailto:<?=$data['email']?>"><?=$data['email']?></a></td>
  </tr>
  
  <tr>
    <td class="left">Senha:</td>
    <td><?=$data['password']?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
