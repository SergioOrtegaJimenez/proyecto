<html>
<head>
	
<?php 
	echo $this->Html->charset(); 
?>
	
<title>
		
<?php 
	echo $this->fetch('title'); 
?>

</title>

<?php
	echo $this->Html->css('style','//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', ['fullBase' => true]);
?>

</head>
<body>
<div id="container">
<div id="header">
			
<?=	 $this->element('cabecera');
?>
		
</div>
<div id="content">
			
<?php 
	echo $this->fetch('content'); 
?>
		
</div>
</div>
	
<?=	$this->Html->script(array(
								'//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
								'//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
							)
					); 
?>

</body>
</html>