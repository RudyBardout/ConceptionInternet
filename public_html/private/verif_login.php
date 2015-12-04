$query="Select * from Personnes where login = '".$_POST['login']."';";
$result = pg_query($query);

$list = array();
while($row = pg_fetch_array($result)){
	$list[] = $row;
}

foreach ($list as $row) 
{
	if($_POST['password'] == $row['pass'])
	{
		echo " L'utilisateur est bien identifié";
		if(isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on'){
		if(isset($_POST['login']) && isset($_POST['password'])){
			setcookie('login', false, -1);
			setcookie('pass', false, -1);
			unset($_COOKIE['login']);
			unset($_COOKIE['pass']);

			setcookie('login', $_POST['login'], time()+(30*24*3600));
			setcookie('pass', $_POST['password'], time()+(30*24*3600));
		}
	}
	}else{
		<script language='javascript' type='text/javascript'>
			window.location.replace("../index.php");
		</script>
	}
}