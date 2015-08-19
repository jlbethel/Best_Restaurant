<?php
    /**
   * @backupGlobals disabled
   * @backStaticAttributes disabled
   */

   require_once "src/Restaurant.php";
   require_once "src/Cuisine.php";

   $server = 'mysql:host=localhost;dbname=best_eats_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class RestaurantTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Restaurant::deleteAll();
        //     Cuisine::deleteAll();
        // }

        function test_getId()
        {
            //Arrange
            $flavor = "Pizza";
            $id = null;
            $test_cuisine = new Cuisine($flavor, $id);
            $test_cuisine->save();

            $name = "Pizza Party";
            $phone_number = "555-345-2378";
            $address = "1234 Pepperoni Lane";
            $cuisine_id = $test_cuisine->getId();
            $test_restaurant = new Restaurant($name, $phone_number, $address, $id, $cuisine_id);
            $test_restaurant->save();

            //Act
            $result = $test_restaurant->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getCuisineId()
        {
            //Arrange
            $flavor = "Burgers";
            $id = null;
            $test_cuisine = new Cuisine($flavor, $id);
            $test_cuisine->save();

            $name = "Burger Bash";
            $phone_number = "555-666-7777";
            $address = "8020 Ground Chuck";
            $cuisine_id = $test_cuisine->getId();
            $test_restaurant = new Restaurant($name, $phone_number, $address, $id, $cuisine_id);
            $test_restaurant->save();

            //Act
            $result = $test_restaurant->getCuisineId();

            //Assert
            $this->assertEquals(true, is_numeric($result));



        }

    }
 ?>
