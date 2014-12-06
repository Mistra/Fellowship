<?php
require_once("userRepository.php");

echo "TEST USER: ";
$name = "Giulio";
$surname = "Mistrangelo";
$age = 26;
$userCollection = userCollectionFactory::create($mapper);
$user = new user($name, $surname, $age);

$userRepository->persist($user);
$user = $userCollection->retrieve($user->getId());

if ($user->getName() == $name and
    $user->getSurname() == $surname and
    $user->getAge() == $age)
    echo "OK" . PHP_EOL;
else {
    echo "FAIL" . PHP_EOL;
    exit;
}

?>