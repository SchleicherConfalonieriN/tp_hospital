<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
<div>
<form name= "agregar_estudios"method="post" action="../controllers/registroEstudio.php">
  

  <label for="Identificador">Id:</label><br>
  <input type="number" id="Identificador" name="identificador" required="required"><br>

  <label for="nombre">Nombre:</label><br>
  <input type="text" id="nombre" name="nombre" required="required"><br>
  
  <label for="descripcion">Descripcion:</label><br>
  <input type="text" id="descripcion" name="descripcion" required="required"><br>
  
  <label for="Precio">Precio:</label><br>
  <input type="number" id="precio" name="precio" required="required"><br>


  <select name="horario" >
    <option value="M" >Mañana</option>
    <option value="T">Tarde</option>
  </select><br><br>




  <input type="submit" value="Registrar estudio"></input>
  </form>
</div>

<div>
  <table>

LISTADO DE SERVICIOS DISPONIBLES  
  <tr>
      <td>Id</td>
      <td>Nombre</td>
      <td>Descripcion</td>
      <td>Precio</td>

    </tr>


    <?php foreach ($this->listado_estudios as $e) {?>
    <tr>
        <td><?php echo $e['estudio_id'] ?></td>
        <td><?php echo $e['nom_estudio'] ?></td>
        <td><?php echo $e['desc_estudio'] ?></td>
        <td><?php echo $e['precio']?></td>
       
    </tr>
    <?php } ?>
  </table>
</div>




<div>
<form name= "eliminar_estudios"method="post" action="../controllers/eliminarEstudio.php">
  <label for="nombre">Identificador:</label><br>
   <input type="number" name="id" required="required"><br>
<input type="submit" value="Eliminar Estudio"></input>
  </form>
</div>
</body>
</html>