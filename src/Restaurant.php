<?php
    class Restaurant
    {
        private $name;
        private $phone_number;
        private $address;
        private $id;
        private $cuisine_id;



        function __construct($name, $phone_number, $address, $id, $cuisine_id)
        {
            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->address = $address;
            $this->id = $id;
            $this->cuisine_id = $cuisine_id;
        }
    }


 ?>
