<?php

require_once './Car.php';
class Bus extends Car
{

	public function fuelUsed()

	{
        return (($this->runningDistance() / 20) * ($this->pistonVolume() / 1000))+((70*$this->currentpassenger()*$this->runningDistance())/10000);
	}

    function showLongInfo()
	{
		if(parent::showLongInfo()) {
			printf("Current passenger:        %d \n",
				$this->currentpassenger());
		} else {
			return false;
		}
		return true;
	}
}
?>