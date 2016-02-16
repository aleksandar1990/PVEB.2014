<?php


class Crypter {

    public static function encryptStringToMD5($string)
    {
        return md5($string);
    }

} 