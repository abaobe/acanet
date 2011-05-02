<?php

if(!session_id())
    session_start();
define('SESS_NAME','defins');



class Util {
    //put your code here



    function GenerateRandomString($len = 20) {
        $ranges = array(
            //array("A", "Z"),
            //array("a", "z"),
            array("0", "9"),
        );
        $str = "";
        for ($i = 0; $i < $len; $i++) {
            $t = rand(0, count($ranges)-1);
            $min = ord($ranges[$t][0]);
            $max = ord($ranges[$t][1]);
            $str.=chr(rand($min, $max));
        }
        return $str;
    }

    function redirect($page='index.php?', $byHeader = true) {
        if ($byHeader) {
            header("Location: $page");
        }
        exit();
    }


    function messageExit($message,$type=3,$pageURL=''){
//            die("$message");
        if(empty($pageURL))
            $pageURL = $_SERVER['HTTP_REFERER'];
        $this->setSessData('displayMessage', array($message,$type));
//            $this->redirect($pageURL . "&message=$message&type=$type");
        $this->redirect($pageURL);
    }


    function setSessData($id,$data){
        $_SESSION[SESS_NAME][$id] = $data;
        return true;
    }
    function getSessData($id){
        if(isset($_SESSION[SESS_NAME][$id]))
            return $_SESSION[SESS_NAME][$id];
        else
            return false;
    }
    function unsetSessData($id){
        if(isset($_SESSION[SESS_NAME][$id]))
            unset ($_SESSION[SESS_NAME][$id]);
    }



    function redirectIfNotAuthenticated($accessLevel = 1,$returnFalse = false,$pageURL='login.html'){
        if($member = $this->getSessData('member')){
            if($member['status'] >= $accessLevel)
                return $member;
        }
        if($returnFalse)
            return false;
//            die("not authenticated");
        $this->setSessData('afterLoginRedirectUrl', $_SERVER['HTTP_REFERER']);
        $this->messageExit("You are not authenticated to access this area.",3,$pageURL);
    }


    
    function validateEmailAddress($email){
        return preg_match('|^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$|i',$email);
    }

    function replaceNonAlphaNumerics($stringToBeReplaced, $replaceWith = "-"){
        return preg_replace("@[^A-Za-z0-9]@", $replaceWith, $stringToBeReplaced);
    }

}
?>