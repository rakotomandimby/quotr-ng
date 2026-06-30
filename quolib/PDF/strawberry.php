<?php
$theme = [
	"header" => ["layout" => "logo-company-left-quote-right"],
	"items" => ["columns" => ["ITEM", "QUANTITY", "UNIT PRICE", "AMOUNT"]],
	"styles" => [
		"html,body" => ["font-family" => "DejaVuSans"],
		".company-lines" => [
			"font-size" => ".95em",
			"color" => "#888"
		],
		".quote-title" => [
			"font-size" => "24px",
			"font-weight" => "400",
			"color" => "#ea6ca9"
		],
		".customer-label,.customer-info-label" => ["color" => "#e671a6"],
		".items-table th" => [
			"color" => "#fff",
			"background" => "#ea6ca9",
			"font-weight" => "400",
			"border-bottom" => "3px solid #fff"
		],
		".items-table td" => [
			"background" => "#fbe3ef",
			"font-weight" => "400",
			"border-bottom" => "3px solid #fff"
		],
		".item-description" => ["color" => "#ae2e6c"],
		".total-row td" => [
			"color" => "#af3470",
			"font-weight" => "400"
		],
		".notes" => [
			"padding" => "10px",
			"background" => "#fbe3ef"
		]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";
