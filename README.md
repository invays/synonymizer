## Introduction
Rewrite your content with ease using this simple script. This script automatically generates unique text based on a given string of synonyms. Improve readability, adapt to your audience.
Script will help developer and seo-specialist for making unique meta-description or another seo tags.

## Installation

Install the package via Composer. Run the Composer require command from the Terminal:

```
composer require invays/synonymizer
```

## Example

Use included variables for template.

```php
use Invays\Synonymizer\Synonymizer;

$synonymize = new Synonymizer();
$synonymize->text = "This is a test [test1|test2|test3] of [test4|test5|test6].";

$synonymize->synonimaizer()
```

Use custom user variable.
```php
use Invays\Synonymizer\Synonymizer;

$synonymize = new Synonymizer();
$synonymize->start = "{";
$synonymize->end = "}";
$synonymize->delimiter = ".";
$synonymize->text = "This is a test {test1.test2.test3} of {test4.test5.test6}.";

$synonymize->synonimaizer()
```

Use static string for seo-tags. An identifier must be specified to generate a static text. 

```php
use Invays\Synonymizer\Synonymizer;

$synonymize = new Synonymizer();
$synonymize->text = "This is a test {test1.test2.test3} of {test4.test5.test6}.";

$synonymize->synonimaizer(12344) 
```
