<?php

class UtilDateTime {

    public static function getTimestamp() {
        date_default_timezone_set('America/Recife');
        $dateNow = new DateTime();
        $dateNow = $dateNow->format('Y-m-d H:i:s');
        return $dateNow;
    }
}