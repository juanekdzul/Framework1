<div class="col-xl-12">
	<div class="col-xl-12">
		<h3>Barra</h3>
	</div>
	<div class="col-xl-8"></div>

<h2>Listado de usuarios</h2>


<div><form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="EBCQ4E3V29Q2N">
<table>
<tr><td><input type="hidden" name="on0" value="Modelo">Modelo</td></tr><tr><td><select name="os0">
	<option value="hp">hp $100.00 MXN</option>
	<option value="dell">dell $200.00 MXN</option>
	<option value="acer">acer $300.00 MXN</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="MXN">
<input type="image" src="https://www.sandbox.paypal.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.sandbox.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>

</div>


<h3>Número de usuarios: <?php echo $usersCount; ?></h3>
 <button><a href="<?php echo APP_URL."/users/add/"?>">Nuevo usuario</a></button>

<div class="table">
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>username</th>
		<th>Password</th>
		<th>Type</th>
		<th>Action</th>
		<th>pago</th>
	</tr>

<?php foreach ($users as $user): ?>
<tr>
	<td><?php echo $user["users"]["id"]; ?></td>
	<td><?php echo $user["users"]["username"]; ?></td>
	<td><?php echo $user["users"]["password"]; ?></td>
	<td><?php echo $user["types"]["name"]; ?></td>
	<td>
	 <?php
	 	echo $this->Html->link(
	 	 	"Edit",
 		  array(
 		  	"controller"=>"users",
 		  	"method" =>"edit", 
 		  	"args"=>$user["users"]["id"]
 		  ),
 		  array(
 		  	"title"=>"Editar usuario",
 		  	"target"=>"_black"
 		  )
 		);
         echo " | ";
         echo $this->Html->link(
         	"<span class=\"glyphicon glyphicon-inbox\" aria-hidden=\"true\"></span>",
	 	  "/users/edit/".$user["users"]["id"],
	 	     array(
	 	  		"title"=>"Editar usuario",
 		  	    "target"=>"_black"
	 	  	 )
	 	 );
	 ?>
	 <?php
	 	 echo $this->Html->link(
	 	 	"Delete", "/users/delete/".$user["users"]["id"]);
	 ?>




		<!--<a href="<?php //echo APP_URL."/users/edit/".$user["users"]["id"]; ?>">Edit</a>
		<a onclick="preguntar();">Delete</a>
-->
	</td>
</tr>
<?php endforeach; ?>

</table>
</div>


<script language="Javascript">
function preguntar(){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
   //Redireccionamos si das a aceptar
     window.location.href = "<?php echo APP_URL."/users/delete/".$user["users"]["id"]; ?>"; //página web a la que te redirecciona si confirmas la eliminación
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
}
</script>
</div>


