<?php

error_reporting(E_ALL ^ E_NOTICE);
$myfile = fopen("cases.txt", "r") or die("Unable to open file!");
//store number of lines which are true
$totalTure = 0;

//store result for each line
$results = array();

//store the output string
$printStr = '';

// Output one line until end-of-file
$index = 0;
while(!feof($myfile)) {
  $index ++;
  //store number for each word
  $eachWord = array();

  //store word which shows 3+ times in array
  $fitWords = array();

  //change to lower case then convert into array
  $line = json_decode(strtolower(fgets($myfile)));

  //get values in each row
  foreach ($line as $value) {

    //count word show times
    $eachWord[$value] = $eachWord[$value] + 1;

    //store words show 3 or more times
    if($eachWord[$value] > 2){
      if(!in_array($value,$fitWords)){
        array_push($fitWords,$value);
      }
    }
  }

  //5 or more words show 3+ times
  if(count($fitWords) > 4){
    $totalTure ++;
    array_push($results,true);
    $printStr .= $index.': True<br>';
  }else{
    array_push($results,false);
    $printStr .= $index.': False<br>';
  }

}

fclose($myfile);
echo 'Total number of true test cases in cases is '.$totalTure.'.<br>';
echo $printStr;

?>
