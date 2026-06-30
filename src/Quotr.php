<?php

namespace Quotr;

class Quotr {
  /*** [PART 1] QUOTR DATA ***/
  // (A) FILE PATHS
  private $pathQ;
  private $pathA;
  private $pathD;
  private $pathH;
  private $pathP;

  // (B) FLAGS & TEMP
  private $template = "simple"; // QUOTATION TEMPLATE TO USE
  private $data = null; // TEMP DATA TO GENERATE QUOTATION

  // (C) QUOTATION DATA
  // (C1) COMPANY HEADER
  private $company = [];

  // (C2) HEADERS - QUOTATION #, DATE OF PURCHASE, DUE DATE
  private $head = [];

  // (C3) CUSTOMER
  private $customer = [];

  // (C4) ITEMS - NAME, DESCRIPTION, QTY, PRICE EACH, SUB-TOTAL
  private $items = [];

  // (C5) TOTALS - NAME, AMOUNT
  private $totals = [];

  // (C6) EXTRA FOOTER NOTES, IF ANY
  private $notes = [];

  // (C7) ACCEPTANCE SEGMENT
  private $accept = true;

  public function __construct($basePath = null) {
    $this->pathQ = rtrim($basePath ?: dirname(__DIR__), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    $this->pathA = $this->pathQ . "quolib" . DIRECTORY_SEPARATOR;
    $this->pathD = $this->pathA . "DOCX" . DIRECTORY_SEPARATOR;
    $this->pathH = $this->pathA . "HTML" . DIRECTORY_SEPARATOR;
    $this->pathP = $this->pathA . "PDF" . DIRECTORY_SEPARATOR;
    $this->company = $this->defaultCompany();
  }

  private function defaultCompany() {
    return [
      "http://localhost/code-boxx-logo.png", // URL TO COMPANY LOGO, FOR HTML QUOTATIONS
      $this->pathQ . "code-boxx-logo.png", // FILE PATH TO COMPANY LOGO, FOR PDF/DOCX QUOTATIONS
      "Company Name",
      "Street Address, City, State, Zip",
      "Phone: xxx-xxx-xxx | Fax: xxx-xxx-xxx",
      "https://your-site.com",
      "doge@your-site.com"
    ];
  }

  private function assertDataType($type) {
    if (!in_array($type, ["company", "head", "customer", "items", "totals", "notes", "accept"], true)) {
      throw new \InvalidArgumentException("Not a valid data type - $type");
    }
  }

  private function assertAppendableDataType($type) {
    if (!in_array($type, ["company", "head", "customer", "items", "totals", "notes"], true)) {
      throw new \InvalidArgumentException("Not a valid add() data type - $type");
    }
  }

  private function ensureClassAvailable($class) {
    if (class_exists($class)) {
      return;
    }

    $autoload = $this->pathQ . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
    if (file_exists($autoload)) {
      require_once $autoload;
    }

    if (!class_exists($class)) {
      throw new \RuntimeException("Unable to load required Composer class $class.");
    }
  }

  private function ensureFileExists($file) {
    if (!file_exists($file)) {
      throw new \RuntimeException("$file not found.");
    }
  }

  private function saveContents($file, $contents) {
    if (file_put_contents($file, $contents) === false) {
      throw new \RuntimeException("Error writing the file $file");
    }
  }

  private function html2CanvasScript() {
    $file = $this->pathA . "html2canvas.min.js";
    $this->ensureFileExists($file);
    $script = file_get_contents($file);
    if ($script === false) {
      throw new \RuntimeException("Error reading $file");
    }
    return str_replace("</script>", "<\\/script>", $script);
  }

  // (D) QUOTATION DATA YOGA
  // (D1) ADD () : ADD QUOTATION DATA
  // PARAM $type : type of data (as above - head, customer, items, etc...)
  //       $data : data to add
  public function add ($type, $data) {
    $this->assertAppendableDataType($type);
    $this->$type[] = $data;
  }

  // (D2) SET() : TOTALLY REPLACE QUOTATION DATA
  // PARAM $type : type of data (as above - head, billto, items, etc...)
  //       $data : data to set
  public function set ($type, $data) {
    $this->assertDataType($type);
    $this->$type = $data;
  }

  // (D3) GET () : GET QUOTATION DATA
  // PARAM $type : type of data (as above - head, billto, items, etc...)
  public function get ($type) {
    $this->assertDataType($type);
    return $this->$type;
  }

  // (D4) RESET () : RESET QUOTATION DATA
  public function reset () {
    $this->company = $this->defaultCompany();
    $this->head = [];
    $this->customer = [];
    $this->items = [];
    $this->totals = [];
    $this->notes = [];
    $this->accept = true;
    $this->template = "simple";
    $this->data = null;
  }

  /*** [PART 2] QUOTATION TEMPLATE + OUTPUT ***/
  // (E) TEMPLATE () : USE THE SPECIFIED TEMPLATE
  public function template ($template="simple") {
    $this->template = $template;
  }

  // (F) OUTPUTDOWN () : HELPER FUNCTION FOR FORCE DOWNLOAD
  //  $file : filename
  //  $size : file size (optional)
  public function outputDown ($file="quotation.html", $size="") {
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$file\"");
    header("Expires: 0");
    header("Cache-Control: must-revalidate");
    header("Pragma: public");
    if (is_numeric($size)) { header("Content-Length: $size"); }
  }

  // (G) OUTPUTHTML () : OUTPUT IN HTML
  //  $mode : 1 = show in browser
  //          2 = force download (provide the file name in $save)
  //          3 = save on server (provide the absolute path and file name in $save)
  //          4 = show in browser + save as png
  //  $save : output filename
  public function outputHTML ($mode=1, $save=null) {
    // (G1) TEMPLATE FILE CHECK
    $fileHTML = $this->pathH . $this->template . ".php";
    $this->ensureFileExists($fileHTML);

    // (G2) GENERATE THEME CSS + CONTENT
    $themeCss = "";
    ob_start();
    require $fileHTML;
    $content = ob_get_contents();
    ob_end_clean();

    // (G3) GENERATE HTML INTO BUFFER
    ob_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style><?=$themeCss?></style>
    <?php if ($mode==4) { ?>
    <script><?=$this->html2CanvasScript()?></script>
    <script>window.onload= () => html2canvas(document.getElementById("quotation")).then(canvas => {
      let a = document.createElement("a");
      <?php if ($save===null) { $save = "quotation-" . strtotime("now") . ".png"; } ?>
      a.download = "<?=$save?>";
      a.href = canvas.toDataURL("image/png");
      a.click();
    });</script>
    <?php } ?>
  </head>
  <body><div id="quotation"><?=$content?></div></body>
</html>
    <?php
    $this->data = ob_get_contents();
    ob_end_clean();

    // (G4) OUTPUT HTML
    switch ($mode) {
      // (G4-1) OUTPUT ON SCREEN (SAVE TO PNG)
      default: case 1: case 4:
        echo $this->data;
        break;

      // (G4-2) FORCE DOWNLOAD
      case 2:
        if ($save===null) { $save = "quotation-" . strtotime("now") . ".html"; }
        $this->outputDown($save, strlen($this->data));
        echo $this->data;
        break;

      // (G4-3) SAVE TO FILE ON SERVER
      case 3:
        if ($save===null) { $save = "quotation-" . strtotime("now") . ".html"; }
        $this->saveContents($save, $this->data);
      break;
    }
  }

  // (H) OUTPUTPDF() : OUTPUT IN PDF
  // $mode : 1 = show in browser
  //         2 = force download (provide the file name in $save)
  //         3 = save on server (provide the absolute path and file name in $save)
  // $save : output filename
  public function outputPDF ($mode=1, $save="quotation.pdf") {
    // (H1) LOAD LIBRARY
    $this->ensureClassAvailable(\Mpdf\Mpdf::class);
    $mpdf = new \Mpdf\Mpdf();

    // (H2) LOAD TEMPLATE FILE
    $file = $this->pathP . $this->template . ".php";
    $this->ensureFileExists($file);
    $this->data = "";
    require $file;

    // (H3) OUTPUT
    switch ($mode) {
      // (H3-1) SHOW IN BROWSER
      default: case 1:
        $mpdf->Output();
        break;

      // (H3-2) FORCE DOWNLOAD
      case 2:
        $mpdf->Output($save, "D");
        break;

      // (H3-3) SAVE FILE ON SERVER
      case 3:
        $mpdf->Output($save, "F");
        break;
    }
  }

  // (I) OUTPUTDOCX() : OUTPUT IN DOCX
  //  $mode : 1 = force download (provide the file name in $save)
  //         2 = save on server (provide the absolute path and file name in $save)
  //  $save : output filename
  public function outputDOCX ($mode=1, $save="quotation.docx") {
    // (I1) LOAD LIBRARY
    $this->ensureClassAvailable(\PhpOffice\PhpWord\PhpWord::class);
    $pw = new \PhpOffice\PhpWord\PhpWord();

    // (I2) LOAD TEMPLATE FILE
    $file = $this->pathD . $this->template . ".php";
    $this->ensureFileExists($file);
    $this->data = "";
    require $file;

    // (I3) OUTPUT
    switch ($mode) {
      // (I3-1) FORCE DOWNLOAD
      default: case 1:
        $this->outputDown($save);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw, "Word2007");
        $objWriter->save("php://output");
        break;

      // (I3-2) SAVE FILE ON SERVER
      case 2:
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw, "Word2007");
        $objWriter->save($save);
        break;
    }
  }
}
