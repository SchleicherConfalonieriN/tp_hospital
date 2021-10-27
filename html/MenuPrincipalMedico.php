<!DOCTYPE html>
<html>
<head>
	<title>Ingreso al sistema</title>
</head>
<body>

<div>
  llegoooooo hasta aquii por lo menos 
  <table>

    <<?php foreach ($this->turnos_reservados as $t) {?>
      <tr>
      <td>
      <<?php echo $t['dni_medico'] ?>
      </td>
      <td>
         <<?php echo $t['fecha'] ?>  
      </td>
    


    </tr>



    <<?php } ?>
    <tr>
      <td>
        

      </td>
      <td>
        
        
      </td>
      <td>
        
        
      </td>


    </tr>


  </table>


</div>

</body>
</html>