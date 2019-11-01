<?php 
require_once './Person.php';
require_once './ShowInfo.php';

class Petlover extends Person implements ShowInfo
{   
    public $pname=array();

    function takePets($getpetname)
    {
        if (in_array($getpetname, $this->pname)) 
        { 
        
        } 
        else
        { 
            array_push($this->pname,$getpetname);
        } 
        
        return true;
    }

    function releasePets()
    {
        unset($this->pname); 
        $this->pname=array();
    }

    function showInfo()
    {
        printf("\nPetlover name: %3s\n", $this->name);
        return true;
    }
    function showLongInfo()
    {
		if($this->showInfo()) {
			printf("Distance: %6d km\n",
            $this->distance);
            printf("Taken pets: ");

            foreach($this->pname as $key =>$value )
            {    
                printf("%s \n",$value);
               if(end($this->pname) !== $value){
                echo ", ";
               }}
           echo "\n";
		} else {
			return false;
		}
		return true;
    }

    function runFor($km)
	{
        $this->distance += $km;

	}

}

?>