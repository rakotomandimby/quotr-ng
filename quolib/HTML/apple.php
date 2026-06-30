<?php
$theme = [
	"styles" => [
		".company-table td,.customer-table td,.items-table td,.items-table th" => ["padding" => "15px"],
		".quote-title" => [
			"font-weight" => "400",
			"color" => "#ad132f"
		],
		".customer-table td" => [
			"background" => "#b92d2d",
			"color" => "#fff"
		],
		".customer-label,.customer-info-label" => ["color" => "#fff"],
		".items-table th" => [
			"border-top" => "2px solid #f6a5a5",
			"border-bottom" => "2px solid #f6a5a5"
		],
		".items-table td" => ["border-bottom" => "1px solid #f6a5a5"],
		".item-description" => ["color" => "#ca3f3f"],
		".acceptance-table td" => ["border" => "1px solid #f6a5a5"]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";