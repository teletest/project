<html>
	<head>
		<title><?php echo $title;?></title>
	</head>
<body>
	
	<h1><?php echo $header;?></h1>
	
	<ul>
	<?php foreach($users as $user):?>
		<li>
			<p><?php echo 'Full Name: '.$user['firstname'].' '.$user['lastname'].' Email: '.$user['email'];?></p>
		</li>
	<?php endforeach;?>
	</ul>

	<p><?php echo $links;?></p>

</body>
</html>