<?php
    session_start();
    require_once 'db.php';
    require_once '../config/config.php';

    $db = new DataBase($HOST, $DBNAME, $USERNAME, $PASSWORD);

    $allPresentations = $db->get_all_presentations();
    $is_logged = false;
    $is_session_set = isset($_SESSION['loggedin']);

    if($is_session_set === false){ 
        $db->consoleLog("There is not a logged student");
        $url_text="../login.html";
        $text="Log In";
        $is_logged = false;
        $class="";
    }else{
        $db->consoleLog("There is a logged student");
        $url_text="logout.php";
        $text="Logout";
        $is_logged = true;
        $class="active";
    }

    date_default_timezone_set('Europe/Sofia');

    if(isset($_GET['ym'])){
        $ym=$_GET['ym'];
    }
    else{
        $ym = date('Y-m');
    }

    $timestamp = strtotime($ym, "-01");
    if($timestamp === false){
        $timestamp=time();
    }

    $today = date('Y-m-d', time());

    $html_title=date('Y / m', $timestamp);

    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

    $day_count = date('t', $timestamp);

    $str = date('w', mktime(0,0,0,date('m', $timestamp), 1, date('Y', $timestamp)));

    $weeks = array();
    $week = '';

    $week .= str_repeat('<td class="tdPresentations" style="background:rgb(236, 241, 249)"></td>', $str);

    for($day = 1; $day <= $day_count; $day++, $str++){
        if($day >= 1 && $day <= 9)
        {
            $day0 = '0'.$day;
            $date = $ym.'-'.$day0;
        }
        else{
            $date = $ym.'-'.$day;
        }
        //echo ' current ' . $date;
        if($today == $date){
            $week .= '<td onclick="setCookie(event)" id="today" title="'.$date.'"><a href="day.php"><div class="td_element">'.$day;
        }else{
            $week .= '<td onclick="setCookie(event)" class="tdPresentations" title="'.$date.'"><a href="day.php"><div class="td_element">'.$day;
        }

        $week .= '<p class="td_information" style="font-size:20px; color: red">';
        foreach($allPresentations as $Presentation){
            //echo ' presentations ' . $Presentation['Date'];
            if($Presentation['Date'] === $date){
                $week .= '&#9679';
            }
        }
        $week .= '</p></div></a></td>';

        if($str % 7 == 6 || $day == $day_count){
            if($day == $day_count){
                //Add empty cell
                $week .= str_repeat('<td class="tdPresentations" style="background:rgb(236, 241, 249)"></td>', 6 - ($str % 7));
            }
            $weeks[] = '<tr class="tr_calendar">'.$week.'</tr>';
            $week = '';
        }
    }
?>