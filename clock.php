<?php

/**
 * @method validateTime validates time using regex
 * @param $time is string
 * @param return returns boolean
 */
function validateTime($time) {
  
    $validation = false;  
    if(preg_match('/^[0][0-9]|[1][0-9]|[2][0-3]:[0-5][0-9]*$/', $time)) {
        $validation = true;    
      }
    return $validation;
  }
  

function checkDayTime ($hour) {
    $dayTime = "am";

    if ($hour > 11) {
        $dayTime = "pm";
    }
    return $dayTime;
}


/**
 * method converts 24hr to 12hr hourstring
 * @param $hour int
 * @param return returns string
 */
function hourString($hour) {

    $hourToString = null;
    $hourToTwelve = array();
    if($hour < 1) {
        $hourToTwelve = explode('0', $hour);
        $hour = $hourToTwelve[1];
    }

    switch ($hour) {
        case 0: 
        case 12: 
          $hourToString = "twelve";
          break;
        case 1: 
        case 13: 
          $hourToString = "one";
          break;
        case 2: 
        case 14: 
          $hourToString = "two";
          break;
        case 3: 
        case 15: 
          $hourToString = "three";
          break;
        case 4: 
        case 16: 
          $hourToString = "four";
          break;
        case 5: 
        case 17: 
          $hourToString = "five";
          break;
        case 6: 
        case 18: 
          $hourToString = "six";
          break;
        case 7: 
        case 19: 
          $hourToString = "seven";
          break;
        case 8: 
        case 20: 
          $hourToString = "eight";
          break;
        case 9: 
        case 21: 
          $hourToString = "nine";
          break;
        case 10: 
        case 22: 
          $hourToString = "ten";
          break;
        case 11: 
        case 23: 
          $hourToString = "eleven";
          break;
          default: "Hour not found";
    }
    return $hourToString;
}

function minuteString($minute) {

    $minuteToWord = "";

    $ones = array(
        0 => "", 
        1 => "one", 
        2 => "two", 
        3 => "three", 
        4 => "four", 
        5 => "five", 
        6 => "six", 
        7 => "seven", 
        8 => "eight", 
        9 => "nine", 
        10 => "ten", 
        11 => "eleven", 
        12 => "twelve", 
        13 => "thirteen", 
        14 => "fourteen", 
        15 => "fifteen", 
        16 => "sixteen", 
        17 => "seventeen", 
        18 => "eighteen", 
        19 => "nineteen" 
        );

        $tens = array(
            0 => "", 
            1 => "ten",
            2 => "twenty", 
            3 => "thirty", 
            4 => "forty", 
            5 => "fifty",
        );

        if($minute > 0 && $minute < 20 && $minute != 10 && $minute != 20 && $minute != 30 && $minute != 40 && $minute != 50) {
            if($minute < 10) {                   
                $minuteToWord = "oh ".$ones[$minute[1]];
            }
            else{
                $minuteToWord = $ones[$minute];
            }
        }
        else if($minute < 20 && $minute < 9 && $minute!= 00) {
            $minuteToWord = $ones[$minute];
        }
        else{
                if($minute[1]!=0){
                    $minuteToWord = $tens[$minute[0]]. " ".$ones[$minute[1]];
                }
                else{
                    $minuteToWord = $tens[$minute[0]];
                }
        }
    return $minuteToWord;
}


//Time in 24 hour formart
$time = null;
$error = null;
$talkingClock = null;

if (isset($_POST['button'])){
    $time = trim($_POST['time']);

    $validation = validateTime($time);
    $error = "";
    if($validation != true) {
        $error = "Error! The time ".$time ." is invalid please enter time in 24hr formart.";
        
    }

    else{
        //split time into hours and minutes
        $timeArray = explode(':', $time);

        $hour = $timeArray[0];
        $minute = $timeArray[1];

        $dayTime = checkDayTime($hour);
        $hourWord = hourString($hour);
        $minuteWord = minuteString($minute);
        $talkingClock = "It's ".$hourWord ." ".$minuteWord." ".$dayTime;
    }
}
