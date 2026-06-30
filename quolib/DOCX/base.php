<?php
$theme = array_replace_recursive([
	"tableStyle" => [
		"width" => 5000,
		"unit" => "pct",
		"alignment" => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER
	],
	"header" => [
		"layout" => "logo-left-company-right-quote-below",
		"logoCellWidth" => 2500,
		"secondaryCellWidth" => 2500,
		"logoStyle" => ["width" => 120],
		"companyFont" => [],
		"companyParagraph" => ["spaceAfter" => 0],
		"quoteText" => "QUOTATION",
		"quoteFont" => ["bold" => true, "size" => 20],
		"quoteParagraph" => [],
		"infoParagraph" => ["spaceAfter" => 0, "spaceBefore" => 0],
		"infoLabelFont" => ["bold" => true],
		"infoValueFont" => [],
		"spacerAfter" => 0
	],
	"customer" => [
		"layout" => "split",
		"customerCellWidth" => 2500,
		"infoCellWidth" => 2500,
		"fullCellWidth" => 5000,
		"customerCellStyle" => [],
		"infoCellStyle" => [],
		"label" => "CUSTOMER",
		"labelFont" => ["bold" => true],
		"labelParagraph" => ["spaceAfter" => 0, "spaceBefore" => 0],
		"lineFont" => [],
		"lineParagraph" => ["spaceAfter" => 0, "spaceBefore" => 0],
		"infoParagraph" => ["spaceAfter" => 0, "spaceBefore" => 0],
		"infoLabelFont" => ["bold" => true],
		"infoValueFont" => []
	],
	"items" => [
		"spacerBefore" => 200,
		"columnWidths" => [2000, 1000, 1000, 1000],
		"headerStyle" => [],
		"headerFont" => ["bold" => true],
		"bodyStyle" => [],
		"descriptionFont" => [],
		"totalsStyle" => null,
		"totalsLabelFont" => ["bold" => true],
		"totalsValueFont" => ["bold" => true]
	],
	"notes" => [
		"cellStyle" => [],
		"font" => [],
		"paragraph" => []
	],
	"acceptance" => [
		"title" => "Customer Acceptance",
		"tableStyle" => [
			"width" => 5000,
			"unit" => "pct"
		],
		"cellStyle" => [
			"borderTopSize" => 15,
			"borderBottomSize" => 15,
			"borderLeftSize" => 15,
			"borderRightSize" => 15,
			"borderTopColor" => "BBBBBB",
			"borderBottomColor" => "BBBBBB",
			"borderLeftColor" => "BBBBBB",
			"borderRightColor" => "BBBBBB"
		],
		"labelFont" => ["color" => "#a5a5a5"],
		"labelParagraph" => ["spaceAfter" => 1000],
		"cells" => [
			["width" => 1667, "label" => "Signature"],
			["width" => 1667, "label" => "Name"],
			["width" => 1666, "label" => "Date"]
		]
	]
], $theme ?? []);

$tableStyle = $theme["tableStyle"];
$section = $pw->addSection();

$addCompanyLines = function ($cell) use ($theme) {
	for ($i = 2; $i < count($this->company); $i++) {
		$cell->addText(
			$this->company[$i],
			$theme["header"]["companyFont"],
			$theme["header"]["companyParagraph"]
		);
	}
};

$addHead = function ($cell, $paragraphStyle, $labelFont, $valueFont) {
	foreach ($this->head as $i) {
		$textrun = $cell->addTextRun($paragraphStyle);
		$textrun->addText($i[0] . ": ", $labelFont);
		$textrun->addText($i[1], $valueFont);
	}
};

switch ($theme["header"]["layout"]) {
	case "logo-company-left-quote-info-right":
		$table = $section->addTable($tableStyle);
		$cell = $table->addRow()->addCell($theme["header"]["logoCellWidth"]);
		$cell->addImage($this->company[1], $theme["header"]["logoStyle"]);
		$addCompanyLines($cell);
		$cell = $table->addCell($theme["header"]["secondaryCellWidth"]);
		$cell->addText(
			$theme["header"]["quoteText"],
			$theme["header"]["quoteFont"],
			$theme["header"]["quoteParagraph"]
		);
		$addHead(
			$cell,
			$theme["header"]["infoParagraph"],
			$theme["header"]["infoLabelFont"],
			$theme["header"]["infoValueFont"]
		);
		break;

	case "logo-company-left-quote-right":
		$table = $section->addTable($tableStyle);
		$cell = $table->addRow()->addCell($theme["header"]["logoCellWidth"]);
		$cell->addImage($this->company[1], $theme["header"]["logoStyle"]);
		$addCompanyLines($cell);
		$cell = $table->addCell($theme["header"]["secondaryCellWidth"]);
		$cell->addText(
			$theme["header"]["quoteText"],
			$theme["header"]["quoteFont"],
			$theme["header"]["quoteParagraph"]
		);
		break;

	case "quote-company-left-logo-right":
		$table = $section->addTable($tableStyle);
		$cell = $table->addRow()->addCell($theme["header"]["logoCellWidth"]);
		$cell->addText(
			$theme["header"]["quoteText"],
			$theme["header"]["quoteFont"],
			$theme["header"]["quoteParagraph"]
		);
		$addCompanyLines($cell);
		$cell = $table->addCell($theme["header"]["secondaryCellWidth"]);
		$cell->addImage($this->company[1], $theme["header"]["logoStyle"]);
		break;

	case "logo-left-company-right-quote-below":
	default:
		$table = $section->addTable($tableStyle);
		$cell = $table->addRow()->addCell($theme["header"]["logoCellWidth"]);
		$cell->addImage($this->company[1], $theme["header"]["logoStyle"]);
		$cell = $table->addCell($theme["header"]["secondaryCellWidth"]);
		$addCompanyLines($cell);
		$section->addText(
			$theme["header"]["quoteText"],
			$theme["header"]["quoteFont"],
			$theme["header"]["quoteParagraph"]
		);
		break;
}

if ($theme["header"]["spacerAfter"] > 0) {
	$section->addText(" ", [], ["spaceBefore" => $theme["header"]["spacerAfter"]]);
}

$table = $section->addTable($tableStyle);
if ($theme["customer"]["layout"] === "customer-only") {
	$cell = $table->addRow()->addCell(
		$theme["customer"]["fullCellWidth"],
		$theme["customer"]["customerCellStyle"]
	);
	$cell->addText(
		$theme["customer"]["label"],
		$theme["customer"]["labelFont"],
		$theme["customer"]["labelParagraph"]
	);
	foreach ($this->customer as $c) {
		$cell->addText($c, $theme["customer"]["lineFont"], $theme["customer"]["lineParagraph"]);
	}
} else {
	$cell = $table->addRow()->addCell(
		$theme["customer"]["customerCellWidth"],
		$theme["customer"]["customerCellStyle"]
	);
	$cell->addText(
		$theme["customer"]["label"],
		$theme["customer"]["labelFont"],
		$theme["customer"]["labelParagraph"]
	);
	foreach ($this->customer as $c) {
		$cell->addText($c, $theme["customer"]["lineFont"], $theme["customer"]["lineParagraph"]);
	}

	$cell = $table->addCell(
		$theme["customer"]["infoCellWidth"],
		$theme["customer"]["infoCellStyle"]
	);
	$addHead(
		$cell,
		$theme["customer"]["infoParagraph"],
		$theme["customer"]["infoLabelFont"],
		$theme["customer"]["infoValueFont"]
	);
}

if ($theme["items"]["spacerBefore"] > 0) {
	$section->addText(" ", [], ["spaceBefore" => $theme["items"]["spacerBefore"]]);
}

$table = $section->addTable($tableStyle);
$table->addRow();
$columns = ["Item", "Quantity", "Unit Price", "Amount"];
foreach ($columns as $index => $label) {
	$cell = $table->addCell($theme["items"]["columnWidths"][$index], $theme["items"]["headerStyle"]);
	$cell->addText($label, $theme["items"]["headerFont"]);
}

foreach ($this->items as $i) {
	$table->addRow();
	$cell = $table->addCell($theme["items"]["columnWidths"][0], $theme["items"]["bodyStyle"]);
	$cell->addText($i[0]);
	if ($i[1] != "") {
		$cell->addText($i[1], $theme["items"]["descriptionFont"]);
	}
	for ($c = 2; $c <= 4; $c++) {
		$cell = $table->addCell(
			$theme["items"]["columnWidths"][$c - 1],
			$theme["items"]["bodyStyle"]
		);
		$cell->addText($i[$c]);
	}
}

$totalsStyle = $theme["items"]["totalsStyle"] ?? $theme["items"]["bodyStyle"];
$totalsWidth = $theme["items"]["columnWidths"][0]
	+ $theme["items"]["columnWidths"][1]
	+ $theme["items"]["columnWidths"][2];
if (count($this->totals) > 0) { foreach ($this->totals as $t) {
	$table->addRow();
	$cell = $table->addCell($totalsWidth, array_merge($totalsStyle, ["gridSpan" => 3]));
	$cell->addText($t[0], $theme["items"]["totalsLabelFont"]);
	$cell = $table->addCell($theme["items"]["columnWidths"][3], $totalsStyle);
	$cell->addText($t[1], $theme["items"]["totalsValueFont"]);
}}

if (count($this->notes) > 0) {
	$section->addText(" ");
	$table = $section->addTable($tableStyle);
	$cell = $table->addRow()->addCell(
		array_sum($theme["items"]["columnWidths"]),
		$theme["notes"]["cellStyle"]
	);
	foreach ($this->notes as $n) {
		$cell->addText($n, $theme["notes"]["font"], $theme["notes"]["paragraph"]);
	}
}

if ($this->accept) {
	$section->addText(" ");
	$section->addText($theme["acceptance"]["title"]);
	$table = $section->addTable($theme["acceptance"]["tableStyle"]);
	$table->addRow();
	foreach ($theme["acceptance"]["cells"] as $acceptCell) {
		$cell = $table->addCell($acceptCell["width"], $theme["acceptance"]["cellStyle"]);
		$cell->addText(
			$acceptCell["label"],
			$theme["acceptance"]["labelFont"],
			$theme["acceptance"]["labelParagraph"]
		);
	}
}
