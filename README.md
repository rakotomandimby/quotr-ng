# Acknowledgements

First, I want to thank the following open-source projects for being the source of inspiration for this project: https://github.com/code-boxx/quotr 
I want to thank the authors of the quotr project for their work and for making it available to the public.
Without their work, this project would not have been possible.

# QUOTR-NG

Quotr-Ng is a free and open-source PHP quotation generator that is capable of creating HTML, PDF, DOCX, and PNG quotations.

> **Namespace support is now available.** You can use Quotr in modern Composer-based applications with `use Quotr\Quotr;` and `new Quotr()`.

<br><br>

## :bulb: HOW TO USE

1) Install dependencies with Composer and load the package through Composer autoload.
2) Import the namespaced class and instantiate it in your application.
3) Set your company information in code, then generate the quotation you need.

```php
<?php

require __DIR__ . "/vendor/autoload.php";

use Quotr\Quotr;

$quotr = new Quotr();
$quotr->set("company", [
  "https://example.com/logo.png",
  __DIR__ . "/logo.png",
  "Company Name",
  "Street Address, City, State, Zip",
  "Phone: xxx-xxx-xxx | Fax: xxx-xxx-xxx",
  "https://your-site.com",
  "hello@your-site.com"
]);
```

Or run  ` php -S localhost:8080 ` for a full working example.

Legacy `require "quolib/quotr.php";` usage still works for backward compatibility, but the Composer-autoloaded namespace is now the primary API.
<br><br>

## :link: DOCUMENTATION & CREDITS
Please visit https://code-boxx.com/quotr-php-quotation-generator for more!

1) PDF output with MPDF - https://mpdf.github.io/
2) DOCX output with PHPWORD - https://github.com/PHPOffice/PHPWord/
3) PNG output with HTML2CANVAS - https://html2canvas.hertzen.com/
<br><br>

## :star: SUPPORT

Like this project? First give it a star to https://github.com/code-boxx/quotr .
Then consider supporting it by donating to the author at https://code-boxx.com/contactus/ . Your support is greatly appreciated!

