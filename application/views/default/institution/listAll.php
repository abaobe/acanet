<?php

    /* ****** ****** ****** ****** ****** ******
    *
    * Author       :   Shafiul Azam
    *              :   ishafiul@gmail.com
    *              :   Core Developer, PROGmaatic Developer Network
    *              :   shafiul.user.sf.net
    * Page         :
    * Description  :   
    * Last Updated :
    *
    * ****** ****** ****** ****** ****** ******/

    // View for joining One.
    if(isset($list)){

        if(!isset($action))
            $action = "join";

        $this->table->clear();
        $data = array();
        $data[] = array("Name", "Short Name", "Location", "Campuses", "Description", "Status", "Action");
        foreach($list as $i){
            $actionText = anchor('institute/join/id_chosen/' . $i->institution_id, "Join!");
            if($action == "modify")
                $actionText = anchor('institute/modify/id_chosen/' . $i->institution_id, "Modify");
            
            $data[] = array($i->name, $i->short_name, $i->location, $i->campuses, $i->short_description,
                $i->status, $actionText);
        }
        echo $this->table->generate($data);
    }else{
        echo "Nothing to display.";
    }
?>
