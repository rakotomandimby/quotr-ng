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
		".quote-title" => ["color" => "#bcd030"],
		".header-info" => ["margin-top" => "10px"],
		".customer-table td" => ["background" => "#d0ec0e"],
		".items-table th" => ["background" => "#d0ec0e"],
		".items-table td" => [
			"border-bottom" => "1px solid #dce4a5",
			"background" => "#f8ffc7"
		],
		".item-description" => ["color" => "#757e39"],
		".acceptance-table td" => [
			"background" => "#f8ffc7",
			"border" => "1px solid #dce4a5",
			"color" => "#c1c1c1"
		]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";