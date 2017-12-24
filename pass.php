<meta charset="utf-8">
<?php

echo boolval(1);
echo boolval("");exit;

// $timeTarget = 0.05; // 50 milliseconds 

// $cost = 8;
// do {
    // $cost++;
    // $start = microtime(true);
    // password_hash($mdp, PASSWORD_BCRYPT, ["cost" => 9]);
    // $end = microtime(true);
// } while (($end - $start) < $timeTarget);

// echo "Appropriate Cost Found: " . $cost . "\n";
?>
<form method="post">
	<input type="text" name="mdp" placeholder="mot de passe">
	<input type="text" name="test" placeholder="mot à tester">
   <input type='submit'>
   <input type='reset'><br>
   <textarea style="width:100%">
<?
if($_POST){
	extract($_POST);

	if(function_exists('password_hash')){
		$hache = password_hash($mdp, PASSWORD_BCRYPT, ["cost" => 9]);

		echo "$mdp => $hache\n";
		echo "$test => " . password_verify($test, $hache) . "\n";
	}else{
		
	}
}
?>
</textarea>

	
</form>
