<?php

namespace App\Enums;

class SupportStatus
{
    const PROCESS="process";
    const WAITING_REPLY = "waiting_reply";
    const ANSWERED="answered";
    const SOLVED="solved";

    // priority status
    const NORMAL_PRIORITY="normal";
    const URGENT_PRIORITY="urgent";
}
