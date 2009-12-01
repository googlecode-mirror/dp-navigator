<?
/**************************************************
 FILENAME: calendar.php
 PURPOSE: Creates Calendar Object and displays month view
 AUTHOR: Matthew A. Malenski
 DATE CREATED: Thu Jun 30 09:37:53 2005
**************************************************/
require_once 'core.php';
require_once('calendar_vars.php');
/**************************************************
 FILENAME: calendar_class.php
 PURPOSE: Define year, month, day, and calendar classes
 AUTHOR: Matthew Malenski
 DATE CREATED: Thu Jun 30 09:38:53 2005
**************************************************/

class year{
    var $year;
    var $months = array();
    function year($yr){
        $this->year = $yr;
        $this->init_year();
    }
    function init_year(){
        for($i=0; $i<12; $i++){
            $this->months[] = new month($this->year,$i);
        }
    }
}

class month{
    var $year;
    var $month;
    var $first; //--- index of first day of current month
    var $last;  //--- index of last day of current month
    var $days = array(); //--- array of days (includes last days of previous and next months)
    var $weeks = array(); //--- array of weeks containing indexes of days for that week
    function month($year,$month){
        //echo "months($year,$month)\n";
        $this->year = $year;
        $this->month = $month;
        $this->init_month();
    }
    function get_name(){
        return date('Y F',mktime(0,0,0,($this->month+1),1,$this->year));
    }
    function get_month_name(){
        return date('Y',mktime(0,0,0,($this->month+1),1,$this->year));
    }
    function get_year(){
        return date('F',mktime(0,0,0,($this->month+1),1,$this->year));
    }
    function init_month(){

        //--- Get the last days of the previous month to show if needed (start the week)
        $offset = -1 * date('w',mktime(0,0,0,($this->month+1),1,$this->year));
        for($i=$offset; $i<0; $i++){
            $timestamp = mktime(0,0,0,$this->month+1,($i+1),$this->year);
            $this->days[] = new day($timestamp);
        }
        //--- Get all the days of the current month
        $days_in_month = date('t',mktime(0,0,0,($this->month+1),1,$this->year));
        for($i=0; $i<$days_in_month; $i++){
            if($i==0) $this->first = count($this->days);
            $timestamp = mktime(0,0,0,($this->month+1),($i+1),$this->year);
            $this->days[] = new day($timestamp);
        }
        $this->last = (count($this->days)-1);

        //--- Get the first days of next month if needed (finish of the week)
        $offset = date('w',$this->days[$this->last]->timestamp)+1;
         for($i=1; $i<=(7-$offset); $i++){
            $timestamp = ($this->days[$this->last]->timestamp)+(24*60*60*$i);
            $this->days[] = new day($timestamp);
        }

        //--- Initialize $this->weeks[]
        //--- IF week ends/starts next/previous year the day('w') function returns wrong week
        //--- WE DO NOT want this so just use week of last/first day of current month

        for($i=0; $i < count($this->days); $i++){
            if($i < $this->first){
                $current_week = $this->days[$this->first]->week;
            }elseif($i > $this->last){
                $current_week = $this->days[$this->last]->week;
            }else{
                $current_week = $this->days[$i]->week;
            }
            $this->weeks[$current_week][] = $i;
        }
    }
    function get_month(){
        return sprintf("%02s",($this->month+1));
    }
}

class day{
    var $year;
    var $month;
    var $day;
    var $timestamp;
    var $name;
    var $week;
    function day($timestamp){
        $this->timestamp = $timestamp;
        $this->year = date('Y',$this->timestamp);
        $this->month = date('m',$this->timestamp);
        $this->day = date('d',$this->timestamp);
        $this->name = date('dMy',$this->timestamp);
        $this->week = week_of_year($this->timestamp);
    }
    function is_today(){
        return ($this->timestamp == mktime(0,0,0,date('m'),date('d'),date('Y')));
    }
    function is_weekend(){
        $day_of_week = date('w',$this->timestamp);
        return (($day_of_week=='0') || ($day_of_week=='6'));
    }
}

class calendar{
    var $yr_id;
    var $mn_id;
    public $month;
    var $events;

    function calendar(){
        //--- FETCH posted year and month use current if none given
        $year  = html_get('year',date('Y'));
        $month = html_get('month',date('m'));

        //--- Validate month and year
        if(!(preg_match('/^20[0-9]{1,2}$/',$year))) $year = date('Y');
        if(!(preg_match('/^(0*)([1-9]|10|11|12)$/',$month))) $month = date('m');

        //--- Process action if any given
        $action = html_get('action');
        switch($action){
            case '+1':
                true;
                $time   = mktime(0,0,0,($month+1),1,$year);
                $year   = date('Y',$time);
                $month  = date('m',$time);
                break;
            case '-1':
                $time   = mktime(0,0,0,($month-1),1,$year);
                $year   = date('Y',$time);
                $month  = date('m',$time);
                break;
            default:
                break;
        }
        $this->set_year($year);
        $this->set_month($month);
        $this->init();
    }
    function set_year($yr){
        $this->yr_id = $yr;
    }
    function set_month($mn){
        $this->mn_id = ($mn - 1);
    }
    function init(){
        $this->month = new month($this->yr_id,$this->mn_id);
    }
    function month_view(){
       }
    function get_title(){
        $title = sprintf("PTO Calendar(%s)",date('F Y',mktime(0,0,0,($this->mn_id+1),1,$this->yr_id)));
        return $title;
    }
}

//--- Create a Calendar Object
$my_cal = new calendar();
 $smarty->assign('title',$my_cal->get_title());
        $smarty->assign('month',$my_cal->month);
        $smarty->assign('cal_months',$GLOBALS['cal_months']);
        $smarty->assign('cal_years',$GLOBALS['cal_years']);
        $smarty->display('calendar.tpl');
    
//$my_cal->month_view();


?>
