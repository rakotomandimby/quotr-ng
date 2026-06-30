<?php
$theme = [
	"header" => [
		"layout" => "logo-company-left-quote-info-right",
		"companyFont" => ["color" => "888888", "size" => "9"],
		"quoteFont" => ["color" => "bcd030", "bold" => true, "size" => 20],
		"quoteParagraph" => [
			"spaceAfter" => 10,
			"spaceBefore" => 0,
			"alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT
		],
		"infoParagraph" => [
			"spaceAfter" => 0,
			"spaceBefore" => 0,
			"alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT
		],
		"spacerAfter" => 200
	],
	"customer" => [
		"layout" => "customer-only",
		"customerCellStyle" => ["bgColor" => "d0ec0e"]
	],
	"items" => [
		"headerStyle" => ["bgColor" => "d0ec0e"],
		"bodyStyle" => [
			"borderBottomSize" => 10,
			"borderBottomColor" => "dce4a5",
			"bgcolor" => "f8ffc7"
		],
		"descriptionFont" => ["size" => 9, "color" => "757e39"]
	],
	"notes" => ["paragraph" => ["spaceAfter" => 0, "spaceBefore" => 0]],
	"acceptance" => [
		"cellStyle" => [
			"borderTopSize" => 15,
			"borderBottomSize" => 15,
			"borderLeftSize" => 15,
			"borderRightSize" => 15,
			"borderTopColor" => "BBBBBB",
			"borderBottomColor" => "BBBBBB",
			"borderLeftColor" => "BBBBBB",
			"borderRightColor" => "BBBBBB",
			"bgcolor" => "f8ffc7"
		]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";
