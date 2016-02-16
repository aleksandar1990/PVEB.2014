<?php

class User {

    //attributes
    protected $firstname;
    protected $lastname;
    protected $address;
    protected $phone;
    protected $id_card_number;
    protected $passport_id;
    protected $username;
    protected $email;
    protected $password;
    protected $social_security_number;
    protected $info;

    //constructor
    public function __construct($firstname, $lastname, $address, $phone, $id_card_number,
                        $passport_id, $username, $email, $password, $ssid, $info )
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $address;
        $this->phone = $phone;
        $this->id_card_number = $id_card_number;
        $this->passport_id = $passport_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->social_security_number = $ssid;
        $this->info = $info;
    }

    //setters and getters
    public function  set_info($info)
    {
        $this->info = $info;
    }

    public  function  get_info()
    {
        return $this->info;
    }

    public function get_firstName()
    {
        return $this->firstname;
    }

    public function get_lastName()
    {
        return $this->lastname;
    }

    public function get_address()
    {
        return $this->address;
    }

    public function get_phone()
    {
        return $this->phone;
    }

    public function get_id_card_number()
    {
        return $this->id_card_number;
    }

    public function get_passport_id()
    {
        return $this->passport_id;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function get_ssn()
    {
        return $this->social_security_number;
    }

    //magic (de)serialization

    public function __sleep()
    {
        return array(
            "firstname"=>$this->firstname,
            "lastname"=>$this->lastname,
            "address"=>$this->address,
            "phone"=>$this->phone,
            "id_card_number"=>$this->id_card_number,
            "passport_id"=>$this->passport_id,
            "username"=>$this->username,
            "email"=>$this->email,
            "password"=>$this->password,
            "info"=>$this->info
        );
    }

} 