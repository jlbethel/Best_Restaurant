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
        protected function tearDown()
        {
            Restaurant::deleteAll();
            Cuisine::deleteAll();
        }

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

        function test_Save()
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

            //Act
            $test_restaurant->save();

            //Assert
            $result = Restaurant::getAll();
            $this->assertEquals($test_restaurant, $result[0]);
        }

        function test_getAll()
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

            $name2 = "Pizza Party";
            $phone_number2 = "555-666-7747";
            $address2 = "1234 Pepperoni Lane";
            $cuisine_id = $test_cuisine->getId();
            $test_restaurant2 = new Restaurant($name2, $phone_number2, $address2, $id, $cuisine_id);
            $test_restaurant2->save();

            //Act
            $result = Restaurant::getAll();

            //Assert
            $this->assertEquals([$test_restaurant, $test_restaurant2], $result);
        }

        function test_deleteAll()
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

            $name2 = "Pizza Party";
            $phone_number2 = "555-666-7747";
            $address2 = "1234 Pepperoni Lane";
            $cuisine_id = $test_cuisine->getId();
            $test_restaurant2 = new Restaurant($name2, $phone_number2, $address2, $id, $cuisine_id);
            $test_restaurant2->save();

            //Act
             Restaurant::deleteAll();

            //Assert
            $result = Restaurant::getAll();
            $this->assertEquals([], $result);
        }

    }
 ?>
