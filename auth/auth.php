<?php
if (isset($_COOKIE["account"])) {
  $account = json_decode($_COOKIE["account"]);
  $url = $_SERVER["REQUEST_URI"];
  $per = $account->permissions;
  $isPermission = 0;
  foreach ($per as  $value) {
    if (str_contains($url, $value)) {
      $isPermission = 1;
      break;
    }
  }
  if ($isPermission == 0) {
    http_response_code(401);
    die(json_encode(array("message" => "khong dc phep")));
  }
} else {
  http_response_code(403);
  die(json_encode(array("message" => "login het han")));
}
