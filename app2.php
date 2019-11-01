<?php
require_once './Pet.php';
require_once './Petlover.php';

echo "Input pet lover name: ";
fscanf(STDIN,"%s",$petlover);
$plover=new Petlover($petlover);
echo "Input number of pets: ";
fscanf(STDIN,"%d",$petnum);

    for($i=1;$i<=$petnum;$i++)
    {
        echo "Input pet $i name: ";
        fscanf(STDIN,"%s",$petname);
        $petinfo[$i]= new Pet($petname);
    }

    function showAllInfo($ownername,$listofpet) {
        $ownername->showLongInfo();
        foreach($listofpet as $item) {
            // if $item is an instance of ShowInfo
            // call showLongInfo();
            if($item instanceof ShowInfo) {
                $item->showLongInfo();
            }

        }
    }

    function runAllFor($list, $km, $petinfo) {
        //print_r($item);
        print_r($petinfo);
        foreach($list as $item) {
            // to make sure $item has runFor method
            print_r($item->pname);
  
            foreach($petinfo as $pet){
                
            if (array_search($pet->petname,$item->pname)) 
            { 
                //$petinfo->runFor($km);
            } 
            }
            if($item instanceof Runnable) {
                $item->runFor($km);
            }
        }
    }



    while($command[0]!='e'){
    echo "\ncommand (h for help): ";
    $getcom=trim(fgets(STDIN));
    $command=explode(" ",$getcom);

    switch($command[0]){
        case 't':  foreach($petinfo as $info){
                        if($command[1]==$info->petname)
                        {
                            $plover->takePets($info->petname,$info->distance);
                        }
                    }
                      break;
        case 're':  $plover->releasePets(); break;
            
        case 'r' :  $runninglist=[$plover,$plover->$pname];
                    runAllFor($runninglist, $command[1],$petinfo);
                    
                     break;
        case 'i' : showAllInfo($plover,$petinfo); break;
        case 'e' : break;
        case 'h' : echo "\nt  take the given pet name";
                   echo "\nre release all taken pets";
                   echo "\nr  run for the given km ";
                   echo "\ni  show information of pet lover and all pets ";
                   echo "\ne  exit ";
                   echo "\nh  print this help\n";
                 break;
    }}


 
?>