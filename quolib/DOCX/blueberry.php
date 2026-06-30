<?php
$theme = [
	"header" => [
		"layout" => "quote-company-left-logo-right",
		"logoStyle" => [
			"width" => 120,
			"alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT
		],
		"companyFont" => ["color" => "888888", "size" => "9"],
		"quoteFont" => ["color" => "258ec7", "bold" => true, "size" => 20],
		"quoteParagraph" => ["spaceAfter" => 200, "spaceBefore" => 0],
		"spacerAfter" => 200
	],
	"items" => [
		"headerStyle" => [
			"borderBottomSize" => 18,
			"borderBottomColor" => "98c5dc",
			"borderTopSize" => 18,
			"borderTopColor" => "98c5dc",
			"bgColor" => "98c5dc"
		],
		"bodyStyle" => [
			"borderBottomSize" => 10,
			"borderBottomColor" => "c8d2d7",
			"bgColor" => "e4eff5"
		],
		"descriptionFont" => ["size" => 9, "color" => "777777"],
		"totalsStyle" => ["bgcolor" => "98c5dc"]
	],
	"notes" => ["cellStyle" => ["bgcolor" => "e4eff5"]],
	"acceptance" => [
		"cellStyle" => [
			"borderTopSize" => 15,
			"borderBottomSize" => 15,
			"borderLeftSize" => 15,
			"borderRightSize" => 15,
			"borderTopColor" => "ffffff",
			"borderBottomColor" => "ffffff",
			"borderLeftColor" => "ffffff",
			"borderRightColor" => "ffffff",
			"bgColor" => "e4eff5"
		]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";
