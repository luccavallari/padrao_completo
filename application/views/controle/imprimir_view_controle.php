<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div style="font-family:Arial; width: 960px; margin:0 auto;"><h2>Listagem de Secretárias</h2></div>
	<div style="font-family:Arial; width: 960px; margin:0 auto;"><small>Total de Cadastros: <?php echo $total; ?></small></div>
	<!-- <table style="font-family:Arial; width: 960px; margin:0 auto; text-align:left; border-collapse: collapse; font-size: 16px;" border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>CPF</th>
				<th>NOME</th>
				<th>CONSULTORIO</th>
				<th>ENDEREÇO</th>
				<th>COMPL.</th>
				<th>TELEFONE</th>
				<th>DATA CAD.</th>
			</tr>
		</thead>
		<tbody> -->
			<?php echo $listaSecretarias; ?>
<!-- 		</tbody>
	</table> -->
</body>
</html>