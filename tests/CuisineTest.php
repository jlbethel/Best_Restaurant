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

        protected function tearDown()
        {
            Cuisine::deleteAll();
            // Restaurant::deleteAll();
        }

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

        function test_getId()
        {
            //Arrange
            $flavor = "Pizza";
            $id = 1;
            $test_Cuisine = new Cuisine($flavor, $id);

            //Act
            $result = $test_Cuisine->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $flavor = "Pizza";
            $test_Cuisine = new Cuisine($flavor);
            $test_Cuisine->save();

            //Act
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals($test_Cuisine, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $flavor = "Pizza";
            $flavor2 = "Burgers";
            $test_Cuisine = new Cuisine($flavor);
            $test_Cuisine->save();
            $test_Cuisine2 = new Cuisine($flavor2);
            $test_Cuisine2->save();

            //Act
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([$test_Cuisine, $test_Cuisine2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $flavor = "Pizza";
            $flavor2 = "Burgers";
            $test_Cuisine = new Cuisine($flavor);
            $test_Cuisine->save();
            $test_Cuisine2 = new Cuisine($flavor2);
            $test_Cuisine2->save();

            //Act
            Cuisine::deleteAll();
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Pizza";
            $name2 = "Burgers";
            $test_Cuisine = new Cuisine($name);
            $test_Cuisine->save();
            $test_Cuisine2 = new Cuisine($name2);
            $test_Cuisine2->save();

            //Act
            $result = Cuisine::find($test_Cuisine->getId());

            //Assert
            $this->assertEquals($test_Cuisine, $result);
        }




































    }
 ?>
