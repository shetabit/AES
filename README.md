# AES
Encrypt and Decrypt data with AES algorithm with PHP

# Example
```PHP
require "AES.php";

$aes = new AES(
	'WR7rLKlVvJdEAIzHUMpt4dcEKsXPinIU2KiWzm++bhg=',
	'AES-256-CBC',
	'NJ0oI9P1fytagUfPny3qTA=='
);

$plainText = "Please, encrypt me!";

$encrypted = $aes->encrypt($plainText);

echo "Encrypted : {$encrypted}<br />";

$decrypted = $aes->decrypt($encrypted);

echo "Decrypted : {$decrypted}<br />";
```
