<?php

namespace App\Enums;

class SwapStatus
{
    const PENDING="pending";
    const PROGRESS="progress";
    const REJECTED="rejected";
    const Completed="completed";

    // these are for pivot status
    const LEARNED="learned";
}
