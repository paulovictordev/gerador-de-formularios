<?php

declare(strict_types=1);

class Tag
{
    public static function create(string $tagName, string $content): string
    {
        return "
      <{$tagName}>
        {$content}
      </{$tagName}>
    ";
    }

    public static function single(string $tagName): string
    {
        return "<{$tagName}>";
    }
}