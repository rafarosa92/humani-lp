<?php
$title = 'Nova mensagem da landing page humani';
$from_email = "robot@humani.com.br";
$headers = "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: " . $from_email;

$values = [
  "name" => $_POST["name"] ?? "",
  "email" => $_POST["email"] ?? "",
  "message" => $_POST["message"] ?? "",
];

$result = ["success" => false, "error" => false];
$valid_form = !in_array("", array_values($values));

if($valid_form) {
  $message = "
nome: {$values['name']}<br>
email: {$values['email']}<br>
message: {$values['message']}<br>
";

 $sent_mail = mail($from_email, $title, $message, $headers);

  if($sent_mail) {
    $result["success"] = true;
  } else {
    $result["error"] = "Não foi possível o envio dos dados. Por favor, tente novamente mais tarde.";
  }
} else {
  $result["error"] = "Dados Inválidos";
}

echo json_encode($result);
