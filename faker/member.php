<?php
require_once 'vendor/autoload.php';
include('../database.php');

$stm = $db_con->prepare("INSERT INTO members (username, password, name, surname, tel, nickname) VALUES (:username, :password, :name, :surname, :tel, :nickname)");
$stm->bindParam("username", $username, PDO::PARAM_STR);
$stm->bindParam("password", $password, PDO::PARAM_STR);
$stm->bindParam("name", $name, PDO::PARAM_STR);
$stm->bindParam("surname", $surname, PDO::PARAM_STR);
$stm->bindParam("tel", $tel, PDO::PARAM_STR);
$stm->bindParam("nickname", $nickname, PDO::PARAM_STR);

$faker = Faker\Factory::create();
for ($i = 0; $i < 500; $i++) {
   $data = [
      'username' =>  $faker->userName,
      'password' =>  $faker->password,
      'name' =>  $faker->firstName,
      'surname' =>  $faker->lastName,
      'tel' =>  $faker->phoneNumber,
      'nickname' =>  $faker->name,
   ];

   $stm->execute($data);
   $id =  $db_con->lastInsertId();
}
