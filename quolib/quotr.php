<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Quotr.php";

if (!class_exists("Quotr", false)) {
  class_alias(\Quotr\Quotr::class, "Quotr");
}

$quotr = new \Quotr\Quotr();
