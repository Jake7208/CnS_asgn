<?php
// validate investment inputs here
    //must be valid number
    if( $investment == NULL || $investment === FALSE['investment']) {
        $error_message = "Must be a valid number.";
    } else if($investment <= 0){
        $error_message = "Not greater than 0.";
    }
    // make sure it is greater than 0 and less than or equal to 15
    else if(  $interest_rate == NULL || $interest_rate === FALSE['interest_rate']) {
        $error_message = "Must be a valid Interest rate.";
    } else if($interest_rate <= 0){
        $error_message = "Interest rate must be greater than 0";
    } else if($interest_rate > 15){
        $error_message = "Interest rate no higher than 15.";
    }
     // be valid number, greater than 0, less than 31
     else if( $years == NULL || $years === FALSE['years']) {
         $error_message = "Must be a valid amount of years.";
     } else if($years <= 0){
         $error_message = "years must be greater than 0.";
     } else if($years > 31){
         $error_message = "years must be less than 31";
     }
    // make empty so it can run the errors.
    else {
    $error_message = '';
}
    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit(); }
?>
