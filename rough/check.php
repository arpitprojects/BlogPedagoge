<?php 
$password = 'gf45_gdf#4hg';
echo $password;
echo '<br>'.'-----------------------------------------------------------------';
// A higher "cost" is more secure but consumes more processing power
$cost = 10;
echo mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
echo '<br>'.'-----------------------------------------------------------------';
// Create a random salt
$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
echo '<br>'.'-----------------------------------------------------------------';
echo base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM));
// Prefix information about the hash so PHP knows how to verify it later.
// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
echo '<br>'.'-----------------------------------------------------------------';
$salt = sprintf("$2a$%02d$", $cost) . $salt;
echo '<br>'.'-----------------------------------------------------------------';
echo $salt;
// Value:
// $2a$10$eImiTXuWVxfM37uY4JANjQ==

// Hash the password with the salt
$hash = crypt($password, $salt);
echo '<br>';
echo $hash;
?>