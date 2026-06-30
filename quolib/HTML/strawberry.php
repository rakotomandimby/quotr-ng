<?php
$theme = [
	"header" => ["layout" => "logo-company-left-quote-right"],
	"styles" => [
		".company-lines" => [
			"padding" => "10px",
			"font-size" => ".95em",
			"color" => "#888"
		],
		".quote-title" => [
			"display" => "inline-block",
			"width" => "240px",
			"padding" => "10px",
			"text-align" => "center",
			"font-weight" => "400",
			"color" => "#fff",
			"background" => "#e671a6"
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