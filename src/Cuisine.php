<?php
    class Cuisine
    {
        private $flavor;
        private $id;

        function __construct($flavor, $id = null)
        {
            $this->flavor = $flavor;
            $this->id = $id;
        }

        function setFlavor($new_flavor)
        {
            $this->flavor = (string) $new_flavor;
        }

        function getFlavor()
        {
            return $this->flavor;
        }

        function getId()
        {
            return $this->id;
        }
    }

 ?>
