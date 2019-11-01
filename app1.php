<?php
require_once './Car.php';
require_once './Bus.php';
require_once './Person.php';


echo "Input (owner cc): ";
fscanf(STDIN,"%s %d",$owner,$piston);

$car = new Bus($owner, $piston);
while($command[0]!='e'){
echo "command (h for help): ";
$getcom=trim(fgets(STDIN));
$command=explode(" ",$getcom);
switch($command[0]){
	case '0': $car->engineStop(); break;
	case '1': $car->engineStart(); break;
	case 'p': $car->getpassenger($command[1]); break;
	case 'r': $car->runFor($command[1]); break;
	case 'i': $car->showLongInfo(); break;
	case 'h': echo " \t0 stop engine
	1 start engine 
	r run for the given km 
	p set number of passengers with the given number 
	i show information (engine is off only) 
	e exit 
	h print this help\n";
			break;
}
}
