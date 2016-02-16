<?php
//rolles
class UserRoleConsts {
    const  client = "klijent";
    const owner = "vlasnik";
    const mechanic = "mehanicar";

    public static function isRoleClient($role)
    {
      return $role == self::client;
    }

    public static function isRoleOwner($role)
    {
      return $role == self::owner;
    }

    public static function isRoleMechanic($role)
    {
      return $role == self::mechanic;
    }
}
?>