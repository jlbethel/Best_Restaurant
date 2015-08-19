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

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO cuisines (flavor) VALUES ('{$this->getFlavor()}');");
            $this->id= $GLOBALS['DB']->lastInsertId();

        }

        static function getAll()
        {
            $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
            $cuisines = array();
            foreach($returned_cuisines as $cuisine) {
                $flavor = $cuisine['flavor'];
                $id = $cuisine['id'];
                $new_cuisine  = new Cuisine($flavor, $id);
                array_push($cuisines, $new_cuisine);
            }
            return $cuisines;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM cuisines;");
        }

        static function find($search_id)
        {
            $found_cuisine = null;
            $cuisines = Cuisine::getAll();
            foreach($cuisines as $cuisine) {
                $cuisine_id = $cuisine->getId();
                if ($cuisine_id == $search_id) {
                    $found_cuisine = $cuisine;
                }
             return $found_cuisine;
            }
        }
    }

 ?>
