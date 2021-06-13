<?php

declare(strict_types=1);

class Style
{
    public static function add(string $stylePath): string
    {
        return "
      <link rel='stylesheet' href='{$stylePath}'>
    ";
    }
}