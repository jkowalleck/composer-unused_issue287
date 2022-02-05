<?php

namespace Jkowalleck\ComposerUnusedIssue287;

use Swaggest\JsonSchema;


/**
 * A reproducible use case dor demo purposes.
 * The sole purpose is to show an `use Swaggest\JsonSchema` not being detected.
 */
class Foo
{
    public static function bar(JsonSchema\InvalidValue $error)
    {
        print_r($error); // for demo reasons.
    }
}