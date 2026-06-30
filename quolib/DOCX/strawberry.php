<?php
$theme = [
	"header" => [
		"layout" => "logo-company-left-quote-right",
		"companyFont" => ["color" => "888888", "size" => "9"],
		"quoteFont" => [
			"color" => "ffffff",
			"bgColor" => "e671a6",
			"bold" => true,
			"size" => 20
		],
		"quoteParagraph" => ["alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT],
		"spacerAfter" => 200
	],
	"customer" => [
		"labelFont" => ["bold" => true, "color" => "e671a6"],
		"infoLabelFont" => ["bold" => true, "color" => "e671a6"]
	],
	"items" => [
		"headerStyle" => [
			"borderBottomSize" => 15,
			"borderBottomColor" => "FFFFFF",
			"bgColor" => "ea6ca9"
		],
		"headerFont" => ["bold" => true, "color" => "FFFFFF"],
		"bodyStyle" => [
			"borderBottomSize" => 15,
			"borderBottomColor" => "FFFFFF",
			"bgColor" => "fbe3ef"
		],
		"descriptionFont" => ["size" => 9, "color" => "ae2e6c"],
		"totalsLabelFont" => ["bold" => true, "color" => "af3470"],
		"totalsValueFont" => ["bold" => true, "color" => "af3470"]
	],
	"notes" => ["cellStyle" => ["bgcolor" => "fbe3ef"]]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";
