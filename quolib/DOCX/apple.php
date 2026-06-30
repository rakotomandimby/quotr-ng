<?php
$theme = [
	"header" => [
		"companyParagraph" => [
			"spaceAfter" => 0,
			"alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT
		],
		"quoteFont" => ["color" => "ad132f", "size" => 18],
		"quoteParagraph" => ["spaceAfter" => 0, "spaceBefore" => 400]
	],
	"customer" => [
		"customerCellWidth" => 2500,
		"infoCellWidth" => 1666,
		"customerCellStyle" => ["bgColor" => "b92d2d"],
		"infoCellStyle" => ["bgColor" => "b92d2d"],
		"labelFont" => ["bold" => true, "color" => "FFFFFF"],
		"lineFont" => ["color" => "FFFFFF"],
		"infoLabelFont" => ["bold" => true, "color" => "FFFFFF"],
		"infoValueFont" => ["color" => "FFFFFF"]
	],
	"items" => [
		"headerStyle" => [
			"borderBottomSize" => 18, "borderBottomColor" => "f6a5a5",
			"borderTopSize" => 18, "borderTopColor" => "f6a5a5"
		],
		"bodyStyle" => ["borderBottomSize" => 10, "borderBottomColor" => "f6a5a5"],
		"descriptionFont" => ["size" => 9, "color" => "ca3f3f"],
		"totalsStyle" => ["borderBottomSize" => 10, "borderBottomColor" => "f6a5a5"]
	],
	"notes" => ["paragraph" => ["spaceAfter" => 0, "spaceBefore" => 0]],
	"acceptance" => [
		"cellStyle" => [
			"borderTopSize" => 15,
			"borderBottomSize" => 15,
			"borderLeftSize" => 15,
			"borderRightSize" => 15,
			"borderTopColor" => "f6a5a5",
			"borderBottomColor" => "f6a5a5",
			"borderLeftColor" => "f6a5a5",
			"borderRightColor" => "f6a5a5"
		]
	]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";
