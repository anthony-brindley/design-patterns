<?php

namespace App\Domain\Structural\Proxy;

use Psy\VersionUpdater\Downloader;

class ClientCode
{
    public function runCode(Downloader $subject)
    {
        // initial download (resource intensive)
        $result = $subject->download("http://example.com/");    

        // subsequent download request of same resource - will be resolved from cache
        $result = $subject->download("http://example.com/");    
    }
    
}
