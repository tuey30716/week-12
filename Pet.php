<?php 
require_once './Runnable.php';
require_once './ShowInfo.php';

class Pet implements Runnable, ShowInfo
{
    public $petname;
    public $distance=0;

    function __construct($name)
	  {
		  $this->petname = $name;
    }

    function runningDistance()
	{
		return $this->distance;
	}

	function runFor($km)
	{
		$this->distance += $km;
  }
  
    function showInfo()
    {
        printf("\nPetname: %7s", $this->petname);
        return true;
    }
    function showLongInfo()
    {
		if($this->showInfo()) {
			printf("\nDistance: %6d km\n",
			$this->distance);
		} else {
			return false;
		}
		return true;
    }


}

?>