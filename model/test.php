<?php
require_once("user.php");
require_once("userCollection.php");
require_once("config.php");

echo "TEST USER: ";
$name = "Giulio";
$surname = "Mistrangelo";
$age = 26;
$userCollection = userCollectionFactory::create($mapper);
$user = new user($name, $surname, $age);

$userCollection->save($user);

$user = $userCollection->load($user->getId());
if ($user->getName() == $name and
    $user->getSurname() == $surname and
    $user->getAge() == $age)
  echo "OK" . PHP_EOL;
else {
  echo "FAIL" . PHP_EOL;
  exit;
}

?>