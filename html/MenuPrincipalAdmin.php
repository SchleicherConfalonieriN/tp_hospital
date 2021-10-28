<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<div>
	<table>

LISTADO DE PERSONAL MEDICO	
	<tr>
      <td>nombre del medico</td>
      <td>apellido del medico</td>
      <td>especialidad</td>
    </tr>


    <?php foreach ($this->listado as $l) {?>
    <tr>
        <td><?php echo $l['nom_medico'] ?></td>
        <td><?php echo $l['ape_medico'] ?></td>
         <td><?php echo $l['especialidad']?></td>
    </tr>
    <?php } ?>



	</table>
</div>



</body>
</html>