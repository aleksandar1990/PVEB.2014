<?php

class Cars {

    //attributes
    protected $br_sasije;
    protected $proizvodjac;
    protected $model;
    protected $kategorija;
    protected $br_vrata;
    protected $vrsta_goriva;
    protected $menjac;
    protected $godiste;
    protected $br_motora;
    protected $boja;
	protected $slika;
    protected $cena_kupovine;
	protected $cena_iznajmljivanja;
	protected $kubikaza;
	protected $registraciona_oznaka;
	protected $prva_registracija;
	protected $kilometraza;
	protected $dodatna_oprema;
	protected $datum_unosa;
	protected $iznajmljen;
	

    //constructor
    public function __construct($br_sasije, $proizvodjac, $model, $kategorija, $br_vrata,
                        $vrsta_goriva, $menjac, $godiste, $br_motora, $boja, $slika, $cena_kupovine,
						$cena_iznajmljivanja, $kubikaza, $registraciona_oznaka, $prva_registracija,
						$kilometraza, $dodatna_oprema, $datum_unosa, $iznajmljen)
    {
        $this->br_sasije = $br_sasije;
        $this->proizvodjac = $proizvodjac;
        $this->model = $model;
        $this->kategorija = $kategorija;
        $this->br_vrata = $br_vrata;
        $this->vrsta_goriva = $vrsta_goriva;
        $this->menjac = $menjac;
        $this->godiste = $godiste;
        $this->br_motora = $br_motora;
        $this->boja = $boja;
        $this->cena_kupovine = $cena_kupovine;
		$this->cena_iznajmljivanja = $cena_iznajmljivanja;
		$this->kubikaza = $kubikaza;
		$this->registraciona_oznaka = $registraciona_oznaka;
		$this->prva_registracija = $prva_registracija;
		$this->kilometraza = $kilometraza;
		$this->dodatna_oprema = $dodatna_oprema;
		$this->datum_unosa = $datum_unosa;
		$this->iznajmljen = $iznajmljen;
    }

    //setters and getters
    public function  set_cena_kupovine($cena_kupovine)
    {
        $this->cena_kupovine = $cena_kupovine;
    }

    public  function  get_cena_kupovine()
    {
        return $this->cena_kupovine;
    }

    public function get_br_sasije()
    {
        return $this->br_sasije;
    }

    public function get_proizvodjac()
    {
        return $this->proizvodjac;
    }

    public function get_model()
    {
        return $this->model;
    }

    public function get_kategorija()
    {
        return $this->kategorija;
    }

    public function get_br_vrata()
    {
        return $this->br_vrata;
    }

    public function get_vrsta_goriva()
    {
        return $this->vrsta_goriva;
    }

    public function get_menjac()
    {
        return $this->menjac;
    }

    public function get_godiste()
    {
        return $this->godiste;
    }

    public function get_br_motora()
    {
        return $this->br_motora;
    }

    public function get_boja()
    {
        return $this->boja;
    }

    //magic (de)serialization

    public function __sleep()
    {
        return array(
            "br_sasije"=>$this->br_sasije,
            "proizvodjac"=>$this->proizvodjac,
            "model"=>$this->model,
            "kategorija"=>$this->kategorija,
            "br_vrata"=>$this->br_vrata,
            "vrsta_goriva"=>$this->vrsta_goriva,
            "menjac"=>$this->menjac,
            "godiste"=>$this->godiste,
            "br_motora"=>$this->br_motora,
            "cena_kupovine"=>$this->cena_kupovine, 		
			"cena_iznajmljivanja"=>$this->cena_iznajmljivanja,
            "kubikaza"=>$this->kubikaza,
            "registraciona_oznaka"=>$this->registraciona_oznaka,
            "prva_registracija"=>$this->prva_registracija,
            "kilometraza"=>$this->kilometraza,
            "dodatna_oprema"=>$this->dodatna_oprema, 
			"datum_unosa"=>$this->datum_unosa,
            "iznajmljen"=>$this->iznajmljen
        );
    }

} 