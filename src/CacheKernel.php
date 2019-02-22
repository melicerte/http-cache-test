<?php
namespace App;

use FOS\HttpCache\SymfonyCache\EventDispatchingHttpCache;
use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;

class CacheKernel extends HttpCache
{
    use EventDispatchingHttpCache;

    protected function getOptions()
    {
        return [
            'debug' => true
        ];
    }
}