<?php

class DataContr extends Data
{
    private $firstname;
    private $lastname;
    private $street;
    private $number;
    private $zipcode;
    private $municipality;
    private $iban;

    public function __construct($firstname, $lastname, $street, $number, $zipcode, $municipality, $iban)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->street = $street;
        $this->number = $number;
        $this->zipcode = $zipcode;
        $this->municipality = $municipality;
        $this->iban = $iban;
    }

    public function addData()
    {
        if($this->ibanExists()){
            header('Location: index.php?error=ibanExists');
            exit();
        }

        $this->insertData($this->firstname,$this->lastname,$this->street,$this->number,$this->zipcode,$this->municipality,$this->iban);
    }

    public function getDatas(){
        return $this->selectDatas();
    }

    private function ibanExists(){
        $result = false;
        if($this->checkIban($this->iban)){
            $result = true;
        }
        return $result;
    }




}