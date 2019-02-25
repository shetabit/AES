# AES

[![Maintainability](https://api.codeclimate.com/v1/badges/73cc51ddaf4d700cecd1/maintainability)](https://codeclimate.com/github/shetabit/AES/maintainability)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/shetabit/AES/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/shetabit/AES/?branch=master)
[![StyleCI](https://github.styleci.io/repos/116474325/shield?branch=master)](https://github.styleci.io/repos/116474325)

Encrypt and Decrypt data with AES algorithm with PHP

## Feature
* Set manually iv suitable for static inialization vector (IV)
* Set randomly iv (Recomended)

## Example (Static IV)
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

## Example (Dynamic IV)
```PHP
require "AES.php";

$aes = new AES(
	'WR7rLKlVvJdEAIzHUMpt4dcEKsXPinIU2KiWzm++bhg=',
	'AES-256-CBC'
);

$plainText = "Please, encrypt me!";

$encrypted = $aes->encrypt($plainText);

echo "Encrypted : {$encrypted}<br />";

$decrypted = $aes->decrypt($encrypted, true);

echo "Decrypted : {$decrypted}<br />";
```
