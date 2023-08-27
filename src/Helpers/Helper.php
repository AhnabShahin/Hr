<?php

namespace Xpeedstudio\Hr\Helpers;

class Helper
{
    public static function isValidDate($date)
    {
        return \DateTime::createFromFormat('Y-m-d', $date) !== false;
    }
}
