<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OTRI</title>
	
<?php
	echo $this->fetch('meta');
	echo $this->Html->css(array(
									'//fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic,700,700italic',
									'estilos',
									'mystyle',
									'//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
									'//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
									'sidebar'
							)
						);
	echo $this->fetch('css');
?>
<!-------------------------------------------------------------------------------------FUNCION PARA CAMBIAR COLOR MENU SEGUN LA PESTAÑA------------------------------------->
<?php
	function comprueba()
	{
		$pagina=array_pop(explode("/",$_SERVER["REQUEST_URI"]));
		if ($pagina=="crear")
		{
			echo "<style>";
			echo "a[id='menu1']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
				
		}
		if ($pagina=="verMes")
		{
			echo "<style>";
			echo "a[id='menu1']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="buscar")
		{
			echo "<style>";
			echo "a[id='menu1']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="crearSalida")
		{
			echo "<style>";
			echo "a[id='menu2']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="verMesSalida")
		{
			echo "<style>";
			echo "a[id='menu2']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="buscarSalida")
		{
			echo "<style>";
			echo "a[id='menu2']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="UnidadGastos")
		{
			echo "<style>";
			echo "a[id='menu3']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="addunidad" )
		{
			echo "<style>";
			echo "a[id='menu3']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="Servicios")
		{
			echo "<style>";
			echo "a[id='menu4']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="addServicio")
		{
			echo "<style>";
			echo "a[id='menu4']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="Proveedores")
		{
			echo "<style>";
			echo "a[id='menu5']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="addproveedor")
		{
			echo "<style>";
			echo "a[id='menu5']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="iniciopedido")
		{
			echo "<style>";
			echo "a[id='menu6']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="addpedido")
		{
			echo "<style>";
			echo "a[id='menu6']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="Materiales")
		{
			echo "<style>";
			echo "a[id='menu7']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="addmaterial")
		{
			echo "<style>";
			echo "a[id='menu7']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="Empresas")
		{
			echo "<style>";
			echo "a[id='menu8']"; 
			echo "{";
			echo "background-color:#013ADF ;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="Documentaciones")
		{
			echo "<style>";
			echo "a[id='menu9']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="adddoc")
		{
			echo "<style>";
			echo "a[id='menu9']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="archivo")
		{
			echo "<style>";
			echo "a[id='menu9']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="Reclamaciones")
		{
			echo "<style>";
			echo "a[id='menu10']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="indexrnc")
		{
			echo "<style>";
			echo "a[id='menu10']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="acciones")
		{
			echo "<style>";
			echo "a[id='menu10']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="eventos")
		{
			echo "<style>";
			echo "a[id='menu11']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="trabajador")
		{
			echo "<style>";
			echo "a[id='menu11']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina=="actas")
		{
			echo "<style>";
			echo "a[id='menu11']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";
		}
		if ($pagina!="crear" && $pagina!="verMes" && $pagina!="buscar" && $pagina!="crearSalida" && $pagina!="verMesSalida" && $pagina!="buscarSalida" && $pagina!="UnidadGastos" && $pagina!="addunidad" && $pagina!="Servicios" && $pagina!="addServicio" && $pagina!="Proveedores" && $pagina!="addproveedor" && $pagina!="iniciopedido" && $pagina!="addpedido" && $pagina!="Materiales" && $pagina!="addmaterial" && $pagina!="Empresas" && $pagina!="Documentaciones" && $pagina!="adddoc" && $pagina!="archivo" && $pagina!="Reclamaciones" && $pagina!="indexrnc" && $pagina!="acciones" && $pagina!="eventos" && $pagina!="trabajador" && $pagina!="actas")
		{
			echo "<style>";
			echo "li[id='iniciomenu']"; 
			echo "{";
			echo "background-color: #013ADF;";
			echo "}";
			echo "</style>";	
		}	
	}	
?>

<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</head>
<body>
<!-- Menú superior--->
	
<?php 
	if (AuthComponent::user('id'))
	{	
		echo $this->element('menu_superior');
		echo $this->element('menu_apoyo');
	}
?>
	
<div class="container-fluid">
<div class="contenido">
			
<?php 
	echo $this->Session->flash(); 
?>
<!-- Carga el contenido de la página específica --->
<?php 
	comprueba();
	echo $this->fetch('content');
?>
 
</div>
</div>
<!-- Banner -->
<br>
<br>
<br>

<?php echo $this->element('sql_dump'); 
?>
<?=	$this->Html->script(array(
								'//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
								'//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')); 
?>
<?php 
	echo $this->fetch('script'); 
?>
	
</body>
</html>