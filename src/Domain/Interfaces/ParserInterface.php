<?php

namespace App\Domain\Interfaces;

interface ParserInterface
{
    public function parse(?string $url);
}
