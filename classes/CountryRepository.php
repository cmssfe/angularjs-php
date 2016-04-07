<?php
require_once 'DBHelper.php';
require_once 'Country.php';
require_once 'State.php';

class CountryRepository{
    private static $countries=array();
    
    protected static function init(){
        // $countries=array();
        // array_push($countries,
        // new Country('Austria',"at",array(
        //     new State("Stryria"),new State("Vienna")
        // )));
        
        
        // array_push($countries,
        // new Country('Canada',"ca",array(
        //     new State("Ontario"),new State("Quebec")
        // )));
        
        // array_push($countries,
        // new Country('Luxembourg',"lu"));
        
        // self::$countries=$countries;
        
        DBHelper::resetDB();
        DBHeloper::addCountry(
            new Country('United States','us',array(
                new State('California','ca'),new State('North Dakota'),new State('Wyoming')
            ))
        );
    }
    
    public static function getCountries(){
        // if(count(self::$countries)===0){
        //    self::init(); 
        // }
        // return self::$countries;
        return DBHelper::getCountries();
    }
    
    public static function getStates($countryCode){
        // if(count(self::$countries)===0){
        //     self::init();
        // }
        // $country=array_filter(self::$countries,function($c) use ($countryCode){
        //     return $c->code===$countryCode;
        // });
        // if(count($country)===0){
        //     return array();
        // }
        // $firstCountry=array_shift($country);
        
        // return $firstCountry->states;
        return DBHelper::getStates(new Country('',$countryCode));
    }
    public static function addState($name,$countryCode){
        return DBHelper::addState(new State($name),new Country('',$countryCode));
    }
}
?>