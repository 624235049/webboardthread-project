<?php
require_once 'vendor/autoload.php';
include('../database.php');

$stmt = $db_con->prepare("INSERT INTO replies (detail, commenter, question_id) VALUES (:detail, :commenter, :question_id)");
$stmt->bindParam("detail", $title, PDO::PARAM_STR);
$stmt->bindParam("commenter", $detail, PDO::PARAM_STR);
$stmt->bindParam("question_id", $view, PDO::PARAM_INT);;

$faker = Faker\Factory::create();
for ($i = 0; $i < 100; $i++) {
   $data = [
      'detail' =>  $faker->paragraph,
      'commenter' =>  $faker->name,
      'question_id' => rand(1, 20),
   ];

   $stmt->execute($data);
}