<?php

use Illuminate\Support\Facades\Artisan;

function artisanClear(){
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('permission:cache-reset');
}

function yesNo() : array
{
    return [
        '0'    => 'No',
        '1'    => 'Yes',
    ];
}

function yesNo2() : array
{
    return [
        'Yes'   => 'Yes',
        'No'    => 'No',
    ];
}

function yesNoChoice($choice)
{
    if ($choice == 0){
        return "No";
    } else if ($choice == 1){
        return "Yes";
    } else {
        return "Invalid Choice";
    }
}

/**
 * List of extension name
 * @return array
 */
function extName() : array
{
    return [
        'SR'    => 'SR',
        'JR'    => 'JR',
        'I'     => 'I',
        'II'    => 'II',
        'III'   => 'III',
        'IV'    => 'IV',
        'V'     => 'V',
        'VI'    => 'VI',
        'VII'   => 'VII',
        'VIII'  => 'VIII',
        'IX'    => 'IX',
        'X'     => 'X',
    ];
}

/**
 * List of sex
 * @return array
 */
function sex() : array
{
    return [
        'M' => 'Male',
        'F' => 'Female',
    ];
}

function sex2() : array
{
    return [
        'Male'      => 'Male',
        'Female'    => 'Female',
    ];
}

/**
 * valid character pattern
 */
function validCharactersPattern($string)
{   
    $validCharactersPattern = "/[^a-zA-ZÑñ0-9'Ã‘(),.\-\s]+$/";
    $hasInvalidCharacter = preg_match($validCharactersPattern, $string);
    return $hasInvalidCharacter;
}

/**
 * number only pattern
 */
function numberOnlyPattern($string)
{   
    $numberOnlyPattern = "/[^0-9]+$/";
    $hasInvalidCharacter = preg_match($numberOnlyPattern, $string);
    return $hasInvalidCharacter;
}

function status() : array
{
    return [
        'PERMANENT'     => 'PERMANENT',
        'PROVISIONAL'   => 'PROVISIONAL',
        'JOB ORDER'     => 'JOB ORDER',
        'SUB TEACHER'   => 'SUB TEACHER',
        'ASST. TEACHER' => 'ASST. TEACHER'
    ];
}

function personnel() : array
{
    return [
        'TEACHING'          => 'TEACHING',
        'NON-TEACHING'      => 'NON-TEACHING',
        'RELATED-TEACHING'  => 'RELATED-TEACHING'
    ];
}

function fileCategory() : array
{
    return [
        ''        => 'File Category',
        'CSC'     => 'CSC',
        'OFFICE'  => 'OFFICE'
    ];
}

function superScript($number){
    if ($number == 1){
        return 'st';
    } else if ($number == 2){
        return 'nd';
    } else if ($number == 3){
        return 'rd';
    } else {
        return 'th';
    }
}

function workFromHome() : array
{
    return [
        'On-Site' => 'On-Site',
        'Work from Home (WFH)' => 'Work from Home (WFH)',
    ];
}

function vulnerability() : array
{
    return [
        'PREGNANT' => 'PREGNANT',
        'SENIOR CITIZEN' => 'SENIOR CITIZEN',
        'Not Applicable' => 'Not Applicable',
    ];
}

function levelOfExposure() : array
{
    return [
        'DIRECT/CLOSE CONTACT' => 'DIRECT/CLOSE CONTACT',
        'SECONDARY CONTACT' => 'SECONDARY CONTACT',
        'TERTIARY CONTACT' => 'TERTIARY CONTACT',
        'Not Applicable' => 'Not Applicable',
    ];
}

function months() : array
{
    return [
        '1'     => 'January',
        '2'     => 'February',
        '3'     => 'March',
        '4'     => 'April',
        '5'     => 'May',
        '6'     => 'June',
        '7'     => 'July',
        '8'     => 'August',
        '9'     => 'September',
        '10'    => 'October',
        '11'    => 'November',
        '12'    => 'December',
    ];
}

function monthsName() : array
{
    return [
        'January'   => 'January',
        'February'  => 'February',
        'March'     => 'March',
        'April'     => 'April',
        'May'       => 'May',
        'June'      => 'June',
        'July'      => 'July',
        'August'    => 'August',
        'September' => 'September',
        'October'   => 'October',
        'November'  => 'November',
        'December'  => 'December',
    ];
}

function month($month)
{
    if ($month == 1){
        return 'January';
    } else if ($month == 2){
        return 'February';
    } else if ($month == 3){
        return 'March';
    } else if ($month == 4){
        return 'April';
    } else if ($month == 5){
        return 'May';
    } else if ($month == 6){
        return 'June';
    } else if ($month == 7){
        return 'July';
    } else if ($month == 8){
        return 'August';
    } else if ($month == 9){
        return 'September';
    } else if ($month == 10){
        return 'October';
    } else if ($month == 11){
        return 'November';
    } else if ($month == 12){
        return 'December';
    } else {
        return 'Invalid Month';
    }
}

function holidays ()
{
    $holidays = array(
        // January
        '01-01', // New Year's Day	Regular Holiday
        // February
        '02-12', // Chinese Lunar New Year's Day	Special Non-working Holiday
        '02-25', // People Power Anniversary	Special Non-working Holiday
        // March

        // April
        '04-01', // Maundy Thursday	Regular Holiday
        '04-02', // Good Friday	Regular Holiday
        '04-03', // Black Saturday	Special Non-working Holiday
        '04-04', // Easter Sunday	Observance
        '04-09', // The Day of Valor	Regular Holiday
        // May
        '05-01', // Labor Day	Regular Holiday
        '05-13', // Eidul-Fitar	Regular Holiday
        // June
        '06-12', // Independence Day	Regular Holiday
        // July
        '07-20', // Eid al-Adha (Feast of the Sacrifice)	Regular Holiday
        '07-21', // Eid al-Adha Day 2	Common local holiday
        // August
        '08-21', // Ninoy Aquino Day	Special Non-working Holiday
        '08-30', // National Heroes Day	Regular Holiday
        // September

        // October
                
        // November
        '11-01', // All Saints' Day	Special Non-working Holiday
        '11-02', // All Souls' Day	Special Non-working Holiday
        '11-30', // Bonifacio Day	Regular Holiday
        // December
        '12-08', // Feast of the Immaculate Conception	Special Non-working Holiday
        '12-24', // Christmas Eve	Special Non-working Holiday
        '12-25', // Christmas Day	Regular Holiday
        '12-30', // Rizal Day	Regular Holiday
        '12-31', // New Year's Eve	Special Non-working Holiday
    );

    return $holidays;
}

function tranche() : array
{
    return [
        '1'    => 'First (1' . superScript(1) .')',
        '2'    => 'Second (2' . superScript(2) .')',
        '3'    => 'Third (3' . superScript(3) .')',
        '4'    => 'Fourth (4' . superScript(4) .')'
    ];
}

function otherRemarks() : array
{
    return [
        'TRANSFERRED'   => 'TRANSFERRED',
        'RESIGNED'      => 'RESIGNED',
        'RETIRED'       => 'RETIRED',
        'DECEASED'      => 'DECEASED',
    ];
}

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function trainingTypes() : array
{
    return [
        'Participation' => 'Participation',
        'Recognition'   => 'Recognition',
        'Appreciation'  => 'Appreciation',
        'Commendation'  => 'Commendation',
    ];
}

function quarter() : array
{
    return [
        'First'   => 'First',
        'Second'  => 'Second',
        'Third'   => 'Third',
        'Fourth'  => 'Fourth',
    ];
}

function sy() : array
{
    return [
        '2020'  => 'SY 2020 - 2021',
    ];
}

function completionStatus() : array
{
    return [
        'Reverted'              => 'Reverted',
        'Not Yet Started'       => 'Not Yet Started',
        'Under Procurement'     => 'Under Procurement',
        'Ongoing'               => 'Ongoing',
        'Completed'             => 'Completed',
    ];
}

function swa() : array
{
    return [
        'Lacking'   => 'Lacking',
        'Completed' => 'Completed'
    ];
}

function numberTowords($num)
{
    $ones = array(
        0 =>"ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN"
    );

    $tens = array( 
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY",
        3 => "THIRTY", 
        4 => "FORTY", 
        5 => "FIFTY", 
        6 => "SIXTY", 
        7 => "SEVENTY", 
        8 => "EIGHTY", 
        9 => "NINETY" 
    ); 

    $hundreds = array( 
        "HUNDRED", 
        "THOUSAND", 
        "MILLION", 
        "BILLION", 
        "TRILLION", 
        "QUARDRILLION" 
    );

    $num = number_format($num,2,".",","); 
    $num_arr = explode(".",$num); 

    $wholenum = $num_arr[0]; 
    $decnum = $num_arr[1]; 

    $whole_arr = array_reverse(explode(",",$wholenum)); 
    krsort($whole_arr,1); 
    $rettxt = ""; 
    foreach($whole_arr as $key => $i){
        while(substr($i,0,1)=="0")
            $i=substr($i,1,5);
        if($i < 20){ 
            $rettxt .= $ones[$i]; 
        } elseif ($i < 100){ 
            if(substr($i,0,1)!="0") $rettxt .= $tens[substr($i,0,1)]; 
            if(substr($i,1,1)!="0") $rettxt .= " " . $ones[substr($i,1,1)]; 
        }else{ 
            if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            if(substr($i,1,1)!="0") $rettxt .= " " . $tens[substr($i,1,1)]; 
            if(substr($i,2,1)!="0") $rettxt .= " " . $ones[substr($i,2,1)]; 
        } 
        if($key > 0){ 
            $rettxt .= " " . $hundreds[$key]." "; 
        }
    }
    if($decnum > 0){
        $rettxt .= " and ";
        if($decnum < 20){
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100){
            $rettxt .= $tens[substr($decnum,0,1)];
            $rettxt .= " " . $ones[substr($decnum,1,1)];
        }
    }
    
    $data = ucfirst(strtolower($rettxt)) . " pesos only";

    return $data;
 }

 function vaccineCategories() : array
{
    return [
        'A1. Workers in Frontline Health Services'  => 'A1. Workers in Frontline Health Services',
        'A2. All Senior Citizens'                   => 'A2. All Senior Citizens',
        'A3. Persons with Comorbidities'            => 'A3. Persons with Comorbidities',
        'A4. Frontline personnel in essential sectors, including uniformed personnel' => 'A4. Frontline personnel in essential sectors, including uniformed personnel',
        'A5. Indigent Population'                   => 'A5. Indigent Population',
        'B1. Teachers, Social Workers'              => 'B1. Teachers, Social Workers',
        'B2. Other Government Workers'              => 'B2. Other Government Workers',
        'B3. Other Essential Workers'               => 'B3. Other Essential Workers',
        'B4. Socio-demographic groups at significantly higher risk other than senior citizens and poor population based on the NHTS-PR' => 'B4. Socio-demographic groups at significantly higher risk other than senior citizens and poor population based on the NHTS-PR',
        'B5. Overseas FIlipino Workers'             => 'B5. Overseas FIlipino Workers',
        'B6. Other Remaining Workforce'             => 'B6. Other Remaining Workforce',
        'C. Rest of the Filipino population not otherwise included in the above groups' => 'C. Rest of the Filipino population not otherwise included in the above groups',
    ];
}

function vaccineStatus() : array
{
    return [
        'First Dose'        => 'First Dose',
        'Fully Vaccinated'  => 'Fully Vaccinated'
    ];
}