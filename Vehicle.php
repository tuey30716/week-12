<?php
require_once './Runnable.php';
require_once './ShowInfo.php';

class Vehicle implements Runnable, ShowInfo
{
	private $owner;
	private $isEngineOn;
	private $distance;
	private $passenger;
	function __construct($owner)
	{
		$this->owner = $owner;
		$this->isEngineOn = false;
		$this->distance = 0;
		$this->passenger= 0;
	}

	function engineStart()
	{
		$this->isEngineOn = true;
	}

	function engineStop()
	{
		$this->isEngineOn = false;
	}

	function runningDistance()
	{
		return $this->distance;
	}
	function currentpassenger()
	{
		return $this->passenger;
	}
	function runFor($km)
	{
		if(!$this->isEngineOn) {
			fprintf(STDERR, "Cannot run, engine is off\n");
			return false;
		}
		
		$this->distance += $km;
		return true;
	}
	function getpassenger($getpassenger)
	{

		$this->passenger = $getpassenger;
		return true;
	}
	function showInfo()
	{
		if($this->isEngineOn) {
			fprintf(STDERR, "Cannot show, engine is on\n");
			return false;
		}
		
		printf("\nOwner: %s\n", $this->owner);
		return true;
	}
	
	function showLongInfo()
	{
		if($this->showInfo()) {
			printf("Running distance: %6d km\n",
			$this->distance);
		} else {
			return false;
		}
		return true;
	}
}
