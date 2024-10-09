<?php

namespace App\Domain\Structural\Proxy;

use App\Domain\Structural\Proxy\Contracts\IsDownloader;

class CachingDownloader implements IsDownloader
{
    private $cache = [];

    public function __construct(
        private SimpleDownloader $downloader
    )
    {}

    public function download(string $url): string
    {
        if (!isset($this->cache[$url])) {
            $result = $this->downloader->download($url);
            $this->cache[$url] = $result;
        }
        
        return $this->cache[$url];
    }
}
