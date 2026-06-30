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
		"body" => [
			"font-family" => "arial,sans-serif",
			"padding" => "0",
			"margin" => "0"
		],
		"#quotation" => [
			"padding" => "15px",
			"width" => "800px",
			"margin" => "0 auto"
		],
		".company-table,.customer-table,.items-table,.acceptance-table" => [
			"width" => "100%",
			"border-collapse" => "collapse"
		],
		".company-table,.customer-table" => ["margin-bottom" => "30px"],
		".company-table td,.customer-table td,.items-table td,.items-table th" => ["padding" => "10px"],
		".company-primary,.company-secondary" => ["vertical-align" => "top"],
		".company-table img" => ["max-width" => "180px", "height" => "auto"],
		".align-right" => ["text-align" => "right"],
		".quote-title" => [
			"font-size" => "28px",
			"font-weight" => "700",
			"color" => "#ad132f"
		],
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

$themeCss = $buildCss($theme["styles"]) . $theme["customCss"];

$companyLines = $renderCompanyLines();
$headerInfo = $renderInfo("header-info", "header-info-label", $this->head);
$customerInfo = $renderInfo("customer-info", "customer-info-label", $this->head);
$customerBlock = $renderCustomer();

$html = "";
$headerLayoutClass = "header-layout-" . $theme["header"]["layout"];
switch ($theme["header"]["layout"]) {
	case "logo-company-left-quote-info-right":
		$html .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><img src='" . $this->company[0] . "'/>" . $companyLines . "</td>"
			. "<td class='company-secondary align-right'><div class='quote-title'>"
			. $theme["header"]["quoteText"] . "</div>" . $headerInfo . "</td>"
			. "</tr></table>";
		break;

	case "logo-company-left-quote-right":
		$html .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><img src='" . $this->company[0] . "'/>" . $companyLines . "</td>"
			. "<td class='company-secondary align-right'><div class='quote-title'>"
			. $theme["header"]["quoteText"] . "</div></td>"
			. "</tr></table>";
		break;

	case "quote-company-left-logo-right":
		$html .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><div class='quote-title'>" . $theme["header"]["quoteText"]
			. "</div>" . $companyLines . "</td>"
			. "<td class='company-secondary align-right'><img src='" . $this->company[0] . "'/></td>"
			. "</tr></table>";
		break;

	case "logo-left-company-right-quote-below":
	default:
		$html .= "<table class='company-table " . $headerLayoutClass . "'><tr>"
			. "<td class='company-primary'><img src='" . $this->company[0] . "'/></td>"
			. "<td class='company-secondary align-right'>" . $companyLines . "</td>"
			. "</tr></table>"
			. "<div class='quote-title'>" . $theme["header"]["quoteText"] . "</div>";
		break;
}

$customerLayoutClass = "customer-" . $theme["customer"]["layout"];
if ($theme["customer"]["layout"] === "customer-only") {
	$html .= "<table class='customer-table " . $customerLayoutClass . "'><tr>"
		. "<td class='customer-primary'>" . $customerBlock . "</td>"
		. "</tr></table>";
} else {
	$html .= "<table class='customer-table " . $customerLayoutClass . "'><tr>"
		. "<td class='customer-primary'>" . $customerBlock . "</td>"
		. "<td class='customer-secondary'>" . $customerInfo . "</td>"
		. "</tr></table>";
}

$html .= "<table class='items-table'><tr>";
foreach ($theme["items"]["columns"] as $column) {
	$html .= "<th>" . $column . "</th>";
}
$html .= "</tr>";

foreach ($this->items as $item) {
	$html .= "<tr><td><div>" . $item[0] . "</div>";
	if ($item[1] != "") {
		$html .= "<small class='item-description'>" . $item[1] . "</small>";
	}
	$html .= "</td><td>" . $item[2] . "</td><td>" . $item[3] . "</td><td>" . $item[4] . "</td></tr>";
}

if (count($this->totals) > 0) { foreach ($this->totals as $total) {
	$html .= "<tr class='total-row'><td class='total-label' colspan='3'>" . $total[0]
		. "</td><td class='total-value'>" . $total[1] . "</td></tr>";
}}
$html .= "</table>";

if (count($this->notes) > 0) {
	$html .= "<div class='notes'>";
	foreach ($this->notes as $note) {
		$html .= "<div class='note-line'>" . $note . "</div>";
	}
	$html .= "</div>";
}

if ($this->accept) {
	$html .= "<div class='acceptance'><div class='acceptance-title'>"
		. $theme["acceptance"]["title"] . "</div><table class='acceptance-table'><tr>";
	foreach ($theme["acceptance"]["cells"] as $acceptCell) {
		$html .= "<td>" . $acceptCell . "</td>";
	}
	$html .= "</tr></table></div>";
}

echo $html;
