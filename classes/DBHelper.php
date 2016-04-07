<?php 
require_once 'DBClass.php';
require_once 'Country.php';
require_once 'State.php';

class DBHelper{
    public static function resetDB(){
        
        // DBClass::execute('CREATE TABLE countries(
        //     name VARCHAR(50),
        //     code VARCHAR(10) PRIMARY KEY)');
        
        // DBClass::execute('CREATE TABLE states(
        //     name VARCHAR(50),
        //     code VARCHAR(10)
        // )');
    }
    
    public static function getCountries(){
        $countries=array();
        $db_countries=DBClass::query('SELECT * FROM countries');
        foreach ($db_countries as $db_country) {
            $states=self::getStates(new Country($db_country->name,$db_country->code));
            
            $country=new Country($db_country->name,$db_country->code,$states);
            array_push($countries,$country);
        }
        
        return $countries;
    }
    
    public static function getStates(Country $country){
        $states=array();
        
        $db_states=DBClass::query('SELECT * FROM states WHERE code=?',array($country->code));
        foreach ($db_states as $db_state) {
            
            
            $state=new State($db_state->name);
            array_push($states,$state);
        }
        
        return $states;
    }
    
    public static function addState(State $state,Country $country){
        return DBClass::execute(
            'INSERT INTO states (name,code) VALUES(?,?)',
            array($state->name,$country->code)
        );
        
    }
    
    public static function addCountry(Country $country){
        return DBClass::execute(
            'INSERT INTO countries (name,code) VALUES(?,?)',
            array($country->name,$country->code));
            
            if(count($country->states)>0){
                foreach ($country->states as $state) {
                    self::addState($state,$country);
                }
            }
        
    }
}
?>