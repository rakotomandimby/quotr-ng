<?php
$theme = [
	"header" => [
		"companyParagraph" => [
			"spaceAfter" => 0,
			"alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT
		],
		"quoteFont" => ["color" => "ad132f", "bold" => true, "size" => 20],
		"quoteParagraph" => ["spaceAfter" => 500, "spaceBefore" => 500]
	],
	"items" => [
		"spacerBefore" => 500,
		"headerStyle" => [
			"borderBottomSize" => 18, "borderBottomColor" => "000000",
			"borderTopSize" => 18, "borderTopColor" => "000000"
		],
		"bodyStyle" => ["borderBottomSize" => 10, "borderBottomColor" => "EEEEEE"],
		"descriptionFont" => ["size" => 9, "color" => "999999"],
		"totalsStyle" => [
			"borderBottomSize" => 10,
			"borderBottomColor" => "EEEEEE",
			"bgcolor" => "FAFAFA"
		]
	],
	"notes" => ["cellStyle" => ["bgcolor" => "FAFAFA"]]
];

require __DIR__ . DIRECTORY_SEPARATOR . "base.php";
