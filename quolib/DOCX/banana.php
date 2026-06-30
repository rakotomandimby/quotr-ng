<?php
$theme = [
	"header" => [
		"layout" => "logo-company-left-quote-info-right",
		"companyFont" => ["color" => "888888", "size" => "9"],
		"quoteFont" => ["color" => "#d31f1f", "bold" => true, "size" => 20],
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
		"customerCellStyle" => ["bgColor" => "fff93b"]
	],
	"items" => [
		"headerStyle" => ["bgColor" => "fff93b"],
		"bodyStyle" => [
			"borderBottomSize" => 10,
			"borderBottomColor" => "f3f3b9",
			"bgcolor" => "#ffffe7"
		],
		"descriptionFont" => ["size" => 9, "color" => "757e39"],
		"totalsLabelFont" => ["color" => "#c30d0d", "bold" => true],
		"totalsValueFont" => ["color" => "#c30d0d", "bold" => true]
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
			"bgcolor" => "#ffffe7"
		]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";
