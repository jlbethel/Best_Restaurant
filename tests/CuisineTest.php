<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Cuisine.php";
    // require_once "src/Restaurant.php";

    $server = 'mysql:host=localhost;dbname=best_eats_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CuisineTest extends PHPUnit_Framework_TestCase
    {

        // protected function tearDown()
        // {
        //     Cuisine::deleteAll();
        //     Restaurant::deleteAll();
        // }

        function test_getFlavor()
        {
            //Arrange
            $flavor = "Pizza";
            $test_Cuisine = new Cuisine($flavor);

            //Act
            $result = $test_Cuisine->getFlavor();

            //Assert
            $this->assertEquals($flavor, $result);
        }


    }
 ?>
