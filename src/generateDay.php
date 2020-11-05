<?php
    session_start();
    require_once 'db.php';
    require_once '../config/config.php';

    $db = new DataBase($HOST, $DBNAME, $USERNAME, $PASSWORD);

    $allPresentations = $db->get_all_presentations();
    
    $is_logged = false;
    $class = "";
    $is_session_set = isset($_SESSION['loggedin']);


    $db->consoleLog("session exists:");
    if($is_session_set === false){
        $url_text="../login.html";
        $text="Log In";
        $is_logged = false;
        $class="";
    }else{
        $url_text="logout.php";
        $text="Logout";
        $is_logged = true;
        $class="active";
    }

    date_default_timezone_set('Europe/Sofia');
    $myPhpVar = $_COOKIE['currentDateFromJS'];
    $db->consoleLog($myPhpVar);

    $month = "calendar.php?ym=" . substr($myPhpVar, 0, 7);

     $quarters = array();
     $quarter = '';
     $min_in_quarter = '';

     for($i = 9; $i < 13; $i++){
         if($i < 10){
            $quarter = '0'.$i.':';
         }else{
            $quarter = ''.$i.':';
         }
         for($minutes=0; $minutes<=45; $minutes+=15){
            if($minutes < 10){
                $min_in_quarter = $quarter.'0'.$minutes.':00';
            }
            else{
                $min_in_quarter = $quarter.$minutes.':00';
            }
           

            if(isset($_SESSION['id']) === false){
                $db->consoleLog("PRINT PRINT");
                $db->consoleLog(isset($_SESSION['id']));
                $studentID = '';
            }
            else{
                $studentID = $_SESSION['id'];
            }

            $subject = '';
            $deletenontactive=true;
            foreach($allPresentations as $Presentation){
                if($Presentation['Date'] === $myPhpVar && $Presentation['Time'] === $min_in_quarter && isset($_SESSION['id']) === true && $Presentation['StudentID'] <> $_SESSION['id']){
                    $db->consoleLog("WHEN DIFFERENT");
                    $db->consoleLog("The number of student id of the current presentation");
                    $db->consoleLog($Presentation['StudentID']);
                    $db->consoleLog("The logged user number");
                    //$db->consoleLog($_SESSION['id']);
                    $subject = $Presentation['Subject'];
                    $deletenontactive = false; 
                }
                elseif($Presentation['Date'] === $myPhpVar && $Presentation['Time'] === $min_in_quarter ){
                    $db->consoleLog("WHEN EQUAL");
                    $db->consoleLog("The number of student id of the current presentation");
                    $db->consoleLog($Presentation['StudentID']);
                    $db->consoleLog("The logged user number");
                    //$db->consoleLog($_SESSION['id']);
                    $subject = $Presentation['Subject'];
                     $deletenontactive = true; 
                }
            }

            if($is_session_set === false){
                $time = '<td class="td_time">'.$min_in_quarter.'</td>
                <td class="td_presentation">'.$subject.'</td>
                <td class="td_presentation_add"><a style="pointer-events: none; cursor: default; color: grey;" href="presentation.php"><i class="material-icons">add_circle</i></a></td>
                <td class="td_presentation_delete"><a style="pointer-events: none; cursor: default; color: grey;" href="deletePresentationForm.php"><i class="material-icons">remove_circle</i></a></td>';
            }
            else{
                if($deletenontactive === false && $subject){
                    $time = '<td class="td_time">'.$min_in_quarter.'</td>
                    <td class="td_presentation">'.$subject.'</td>
                    <td class="td_presentation_add"><a style="pointer-events: none; cursor: default; color: grey;" href="presentation.php"><i class="material-icons">add_circle</i></a></td>
                    <td class="td_presentation_delete"><a style="pointer-events: none; cursor: default; color: grey;" href="deletePresentationForm.php"><i class="material-icons">remove_circle</i></a></td>';
                } elseif($deletenontactive === true && $subject){
                    $time = '<td class="td_time">'.$min_in_quarter.'</td>
                    <td class="td_presentation">'.$subject.'</td>
                    <td class="td_presentation_add"><a style="pointer-events: none; cursor: default; color: grey;" href="presentation.php"><i class="material-icons">add_circle</i></a></td>
                    <td class="td_presentation_delete"><a style="color: #b30000;" href="deletePresentationForm.php"><i class="material-icons">remove_circle</i></a></td>';
                }else{
                    $time = '<td class="td_time">'.$min_in_quarter.'</td>
                    <td class="td_presentation">'.$subject.'</td>
                    <td class="td_presentation_add"><a style="color: #168fae;" href="presentation.php"><i class="material-icons">add_circle</i></a></td>
                    <td class="td_presentation_delete"><a style="color: #b30000;" href="deletePresentationForm.php"><i class="material-icons">remove_circle</i></a></td>';
                }
            }
            $quarters[] = '<tr class="tr-presentations" onclick="setCookie(event)">'.$time.'</tr>';
        }
        $quarter = '';
     }
?>    