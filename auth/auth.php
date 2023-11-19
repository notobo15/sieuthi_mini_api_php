<?php
if (isset($_SESSION["account"])) {
  $url = $_SERVER["REQUEST_URI"];
  $per = $_SESSION["account"]['permissions'];
  $isPermission = 0;
  foreach ($per as  $value) {
    if (str_contains($url, $value)) {
      $isPermission = 1;
      break;
    }
  }
  if ($isPermission == 0) {
    http_response_code(403);
    die(json_encode(array("status" => 0, "message" => "You Do Not Have Permission to Access")));
  }
} else {
  http_response_code(401);
  die(json_encode(array("status" => 0, "message" => "Your session has expired, please login again.")));
}
