<?php

class RecoveryText {
    const Subject = "PZW rent a car - Password Recovery";
    //const Message = "You have successfully reseted your account password"."\n"."Now you can login with your new password:";

    public static function generateRandomString($length = 40) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public  static function  getSubject()
    {
        return self::Subject;
    }

    public static function getMessage()
    {
        return "You have successfully reseted your account password."."\n"."Now you can login with your new password: ".
        self::generateRandomString()."\n".". Go to profile page to change your password again.";
    }

    public static function  getNewPassword()
    {
        return $this->generateRadomString();
    }
} 