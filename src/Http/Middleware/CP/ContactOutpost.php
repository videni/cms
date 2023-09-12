<?php

namespace Statamic\Http\Middleware\CP;

use Closure;
use Statamic\Licensing\Outpost;

class ContactOutpost
{
    protected $outpost;

    public function __construct(Outpost $outpost)
    {
        $this->outpost = $outpost;
    }

    public function handle($request, Closure $next)
    {
        // no-license-check
        // $this->outpost->radio();

        return $next($request);
    }
}
