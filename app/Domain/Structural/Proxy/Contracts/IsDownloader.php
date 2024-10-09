<?php

namespace App\Domain\Structural\Proxy\Contracts;

interface IsDownloader
{
    public function download(string $url): string;
}
