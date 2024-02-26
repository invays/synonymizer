<?php
declare(strict_types=1);
namespace Invays\Synonymizer\Tests;

use Invays\Synonymizer\Synonymizer;
use PHPUnit\Framework\TestCase;

class SynonymizerTest extends TestCase
{
    public function testParaphrase(): void
    {
        $synonymize = new Synonymizer();
        $synonymize->text = "This is a test [test1|test2|test3] of [test4|test5|test6].";

        $this->assertIsString($synonymize->synonimaizer());
    }

    public function testParaphraseUseCustom(): void
    {
        $synonymize = new Synonymizer();
        $synonymize->start = "{";
        $synonymize->end = "}";
        $synonymize->text = "This is a test {test1|test2|test3} of {test4|test5|test6}.";

        $this->assertIsString($synonymize->synonimaizer());
    }

    public function testFixParaphrase(): void
    {
        $synonymize = new Synonymizer();
        $synonymize->text = "This is a test [test1|test2|test3] of [test4|test5|test6].";

        $this->assertIsString($synonymize->fix_synonimaizer(23423));
    }

    public function testParaphraseEmpty(): void
    {
        $synonymize = new Synonymizer();
        $synonymize->text = '';

        self::assertSame('Empty text for synonimaizer', $synonymize->synonimaizer());
    }

    public function testFixParaphraseEmpty(): void
    {
        $synonymize = new Synonymizer();
        $synonymize->text = '';

        self::assertSame('Empty text for synonimaizer', $synonymize->fix_synonimaizer());
    }

    public function testFixParaphraseNull(): void
    {
        $synonymize = new Synonymizer();
        $synonymize->text = null;

        self::assertSame('Empty text for synonimaizer', $synonymize->fix_synonimaizer());
    }


}