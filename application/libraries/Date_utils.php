<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Date Utils
 * Requirements: PHP5 or above
 *
 */
class Date_utils {
    public function __construct() {
        
    }
    
    public function __get($var) {
        return get_instance()->$var;
    }
    
    /*
     * This method will convert unix time into human date dd-mm-yyyy format
     * @param $unix_time, time in unix format
     * @param $show_minute, whether minute will be showed or not
     * @param $country_code, country code of this user
     * @author nazmul hasan
     */
    public function get_unix_to_human_date($unix_time, $country_code = 'BD')
    {
        $time_zone_array = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $country_code);
        $dateTimeZone = new DateTimeZone($time_zone_array[0]);
        $dateTime = new DateTime("now", $dateTimeZone);
        $relative_unix_time = $unix_time + $dateTime->getOffset();
        $human_current_time = unix_to_human($relative_unix_time);
        $human_current_time_array= explode(" ", $human_current_time);
        $human_current_date = $human_current_time_array[0];
        $splited_date_content = explode("-", $human_current_date);
        return $splited_date_content[2].'-'.$splited_date_content[1].'-'.$splited_date_content[0].' '.$human_current_time_array[1];        
    }
    
    /*
     * This method will return user current date start time in unix 
     * author nazmul hasan
     */
    public function get_current_date_start_time($country_code = 'BD')
    {
        $time_zone_array = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $country_code);
        $dateTimeZone = new DateTimeZone($time_zone_array[0]);
        $dateTime = new DateTime("now", $dateTimeZone);
        
        $unix_current_time = now() + $dateTime->getOffset();
        $human_current_time = unix_to_human($unix_current_time);
        $human_current_time_array= explode(" ", $human_current_time);
        $human_current_date = $human_current_time_array[0];
        
        $human_current_date_start_time = $human_current_date.' 00:00 AM';
        $unix_current_date_start_time = human_to_unix($human_current_date_start_time);

        return $unix_current_date_start_time - $dateTime->getOffset();
    }
}
