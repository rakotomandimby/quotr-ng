## QUOTR
Quotr is a free and open-source PHP quotation generator that is capable of creating HTML, PDF, DOCX, and PNG quotations. It is a simple and fuss-free package, giving developers a quick boost with their quotation generation needs.

> **Namespace support is now available.** You can use Quotr in modern Composer-based applications with `use Quotr\Quotr;` and `new Quotr()`.

<br><br>

## :camera: SCREENSHOTS & QUOTATION TEMPLATES
<p float="left">
  <img width="250" src="https://code-boxx.com/wp-content/uploads/2021/11/illus-quotr-1.png">
  <img width="250" src="https://code-boxx.com/wp-content/uploads/2021/11/illus-quotr-2.png">
  <img width="250" src="https://code-boxx.com/wp-content/uploads/2021/11/illus-quotr-3.png">
  <img width="250" src="https://code-boxx.com/wp-content/uploads/2021/11/illus-quotr-4.png">
  <img width="250" src="https://code-boxx.com/wp-content/uploads/2021/11/illus-quotr-5.png">
  <img width="250" src="https://code-boxx.com/wp-content/uploads/2021/11/illus-quotr-6.png">
</p><br>

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

Check out `example.php` for a full working example.

Legacy `require "quolib/quotr.php";` usage still works for backward compatibility, but the Composer-autoloaded namespace is now the primary API.
<br><br>

## :link: DOCUMENTATION & CREDITS
Please visit https://code-boxx.com/quotr-php-quotation-generator for more!

1) PDF output with MPDF - https://mpdf.github.io/
2) DOCX output with PHPWORD - https://github.com/PHPOffice/PHPWord/
3) PNG output with HTML2CANVAS - https://html2canvas.hertzen.com/
<br><br>

## :star: SUPPORT
Like this project? Just give it a star. That will indirectly help grow my blog a little bit. :wink:
<br><br>

## :newspaper: LICENSE
Copyright by Code Boxx

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
