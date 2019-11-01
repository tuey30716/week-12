<?php 
require_once './Person.php';
require_once './ShowInfo.php';

class Petlover extends Person implements ShowInfo
{
    private $takepetname=array(array('petname'=>null,'distance'=>null));

    function takePets($getpetname)
    {
        
        print_r($getpetname->petname);//name

        foreach ($this->takepetname as $key) {
            echo $key->petname;
            if ($key->petname === $getpetname->petname) {

            }
            else{
                array_push( $this->takepetname,$getpetname);
            }
        }
        print_r($this->takepetname);
    
        return true;
    }

    function releasePets()
    {
        unset($this->takepetname); 

    }

    function runFor($km)
	{
		$this->distance += $km;
	}

    function showInfo()
    {
        printf("\nPet lover name: %s\n", $this->name);
        return true;
    }
    function showLongInfo()
    {
		if($this->showInfo()) {
			printf("Distance: %6d km\n",
            $this->distance);
            printf("Taken pets: ");

            foreach($this->takepetname as $key )
            {    
               echo $key->petname;
               if(end($this->takepetname) !== $key){
                echo ", ";
               }
            }       
		} else {
			return false;
		}
		return true;
    }



}

?>