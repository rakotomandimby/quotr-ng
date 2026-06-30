<?php
$theme = [
	"header" => ["layout" => "logo-company-left-quote-info-right"],
	"customer" => ["layout" => "customer-only"],
	"styles" => [
		".company-lines" => [
			"font-size" => ".95em",
			"color" => "#888",
			"margin-top" => "10px"
		],
		".quote-title" => ["color" => "#d31f1f"],
		".header-info" => ["margin-top" => "10px"],
		".customer-table td" => ["background" => "#fff93b"],
		".items-table th" => ["background" => "#fff93b"],
		".items-table td" => [
			"border-bottom" => "1px solid #f3f3b9",
			"background" => "#ffffe7"
		],
		".item-description" => ["color" => "#757e39"],
		".total-row td" => ["color" => "#c30d0d"],
		".acceptance-table td" => [
			"background" => "#ffffe7",
			"border" => "1px solid #f3f3b9",
			"color" => "#bcbdba"
		]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";