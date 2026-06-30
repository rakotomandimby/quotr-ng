<?php
$theme = array_replace_recursive([
	"header" => [
		"layout" => "logo-left-company-right-quote-below",
		"quoteText" => "QUOTATION"
	],
	"customer" => [
		"layout" => "split",
		"label" => "CUSTOMER"
	],
	"items" => [
		"columns" => ["Item", "Quantity", "Unit Price", "Amount"]
	],
	"acceptance" => [
		"title" => "Customer Acceptance",
		"cells" => ["Signature", "Name", "Date"]
	],
	"styles" => [
		"html,body" => ["font-family" => "sans-serif"],
		"#quotation" => ["max-width" => "800px", "margin" => "0 auto"],
		".company-table,.customer-table,.items-table,.acceptance-table" => [
			"width" => "100%",
			"border-collapse" => "collapse"
		],
		".company-table,.customer-table" => ["margin-bottom" => "30px"],
		".company-table td,.customer-table td,.items-table td,.items-table th" => ["padding" => "10px"],
		".company-primary,.company-secondary" => ["vertical-align" => "top"],
		".company-table img" => ["max-width" => "180px", "height" => "auto"],
		".align-right" => ["text-align" => "right"],
		".quote-title" => ["font-size" => "28px", "font-weight" => "700", "color" => "#ad132f"],
		".customer-table.customer-split td" => ["width" => "33%"],
		".customer-table.customer-only td" => ["width" => "50%"],
		".header-info-label,.customer-label,.customer-info-label" => ["font-weight" => "700"],
		".items-table th" => ["text-align" => "left"],
		".item-description" => ["font-size" => ".95em"],
		".total-row td" => ["font-weight" => "700"],
		".total-label" => ["text-align" => "right"],
		".notes,.acceptance" => ["margin-top" => "30px"],
		".notes" => ["font-size" => ".95em"],
		".acceptance-table td" => [
			"border" => "1px solid #bbb",
			"padding" => "10px 10px 50px 10px",
			"color" => "#a5a5a5"
		]
	],
	"customCss" => ""
], $theme ?? []);

$buildCss = function (array $styles) {
	$css = "";
	foreach ($styles as $selector => $properties) {
		if (!is_array($properties) || count($properties) === 0) {
			continue;
		}
		$body = "";
		foreach ($properties as $property => $value) {
			if ($value === null || $value === "") {
				continue;
			}
			$body .= $property . ":" . $value . ";";
		}
		if ($body !== "") {
			$css .= $selector . "{" . $body . "}";
		}
	}
	return $css;
};

$renderCompanyLines = function () {
	$html = "<div class='company-lines'>";
	for ($i = 2; $i < count($this->company); $i++) {
		$html .= "<div class='company-line'>" . $this->company[$i] . "</div>";
	}
	$html .= "</div>";
	return $html;
};

$renderInfo = function ($containerClass, $labelClass, array $items) {
	$html = "<div class='" . $containerClass . "'>";
	foreach ($items as $item) {
		$html .= "<div class='" . $containerClass . "-row'><strong class='" . $labelClass . "'>"
			. $item[0] . ":</strong> " . $item[1] . "</div>";
	}
	$html .= "</div>";
	return $html;
};

$renderCustomer = function () use ($theme) {
	$html = "<div class='customer-card'><strong class='customer-label'>"
		. $theme["customer"]["label"] . "</strong>";
	foreach ($this->customer as $customerLine) {
		$html .= "<div class='customer-line'>" . $customerLine . "</div>";
	}
	$html .= "</div>";
	return $html;
};

$companyLines = $renderCompanyLines();
$headerInfo = $renderInfo("header-info", "header-info-label", $this->head);
$customerInfo = $renderInfo("customer-info", "customer-info-label", $this->head);
$customerBlock = $renderCustomer();

$this->data = "<!DOCTYPE html><html><head><style>"
	. $buildCss($theme["styles"])
	. $theme["customCss"]
	. "</style></head><body><div id='quotation'>";

$headerLayoutClass = "header-layout-" . $theme["header"]["layout"];
switch ($theme["header"]["layout"]) {
	case "logo-company-left-quote-info-right":
		$this->data .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><img src='" . $this->company[0] . "'/>" . $companyLines . "</td>"
			. "<td class='company-secondary align-right'><div class='quote-title'>"
			. $theme["header"]["quoteText"] . "</div>" . $headerInfo . "</td>"
			. "</tr></table>";
		break;

	case "logo-company-left-quote-right":
		$this->data .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><img src='" . $this->company[0] . "'/>" . $companyLines . "</td>"
			. "<td class='company-secondary align-right'><div class='quote-title'>"
			. $theme["header"]["quoteText"] . "</div></td>"
			. "</tr></table>";
		break;

	case "quote-company-left-logo-right":
		$this->data .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><div class='quote-title'>" . $theme["header"]["quoteText"]
			. "</div>" . $companyLines . "</td>"
			. "<td class='company-secondary align-right'><img src='" . $this->company[0] . "'/></td>"
			. "</tr></table>";
		break;

	case "logo-left-company-right-quote-below":
	default:
		$this->data .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><img src='" . $this->company[0] . "'/></td>"
			. "<td class='company-secondary align-right'>" . $companyLines . "</td>"
			. "</tr></table>"
			. "<div class='quote-title'>" . $theme["header"]["quoteText"] . "</div>";
		break;
}

$customerLayoutClass = "customer-" . $theme["customer"]["layout"];
if ($theme["customer"]["layout"] === "customer-only") {
	$this->data .= "<table class='customer-table " . $customerLayoutClass . "'><tr>"
		. "<td class='customer-primary'>" . $customerBlock . "</td>"
		. "</tr></table>";
} else {
	$this->data .= "<table class='customer-table " . $customerLayoutClass . "'><tr>"
		. "<td class='customer-primary'>" . $customerBlock . "</td>"
		. "<td class='customer-secondary'>" . $customerInfo . "</td>"
		. "</tr></table>";
}

$this->data .= "<table class='items-table'><tr>";
foreach ($theme["items"]["columns"] as $column) {
	$this->data .= "<th>" . $column . "</th>";
}
$this->data .= "</tr>";

foreach ($this->items as $item) {
	$this->data .= "<tr><td><div>" . $item[0] . "</div>";
	if ($item[1] != "") {
		$this->data .= "<small class='item-description'>" . $item[1] . "</small>";
	}
	$this->data .= "</td><td>" . $item[2] . "</td><td>" . $item[3] . "</td><td>" . $item[4] . "</td></tr>";
}

if (count($this->totals) > 0) { foreach ($this->totals as $total) {
	$this->data .= "<tr class='total-row'><td class='total-label' colspan='3'>" . $total[0]
		. "</td><td class='total-value'>" . $total[1] . "</td></tr>";
}}
$this->data .= "</table>";

if (count($this->notes) > 0) {
	$this->data .= "<div class='notes'>";
	foreach ($this->notes as $note) {
		$this->data .= "<div class='note-line'>" . $note . "</div>";
	}
	$this->data .= "</div>";
}

if ($this->accept) {
	$this->data .= "<div class='acceptance'><div class='acceptance-title'>"
		. $theme["acceptance"]["title"] . "</div><table class='acceptance-table'><tr>";
	foreach ($theme["acceptance"]["cells"] as $acceptCell) {
		$this->data .= "<td>" . $acceptCell . "</td>";
	}
	$this->data .= "</tr></table></div>";
}

$this->data .= "</div></body></html>";
$mpdf->WriteHTML($this->data);
