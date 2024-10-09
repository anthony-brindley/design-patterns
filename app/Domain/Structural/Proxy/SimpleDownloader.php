<?php

namespace App\Domain\Structural\Proxy;

use App\Domain\Structural\Proxy\Contracts\IsDownloader;

class SimpleDownloader implements IsDownloader
{
    public function download(string $url): string
    {
        return file_get_contents($url);
    }
}
