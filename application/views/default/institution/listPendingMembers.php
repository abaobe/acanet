<?php

/* * ***** ****** ****** ****** ****** ******
 *
 * Author       :   Shafiul Azam
 *              :   ishafiul@gmail.com
 *              :   Project Manager
 * Page         :
 * Description  :   
 * Last Updated :
 *
 * ****** ****** ****** ****** ****** ***** */

$this->table->clear();

$tableData = array();

$tableData[] = array("Requesting User", "Chosen Referer", "Action");
foreach($data as $row){
    $tableData[] = array(
        $row->username,
        $row->referer,
        anchor("institute/pendingMembers/approve/$instituteId/member" . $row->username,"Approve") . " " .
        anchor("institute/pendingMembers/approve/$instituteId/banned" . $row->username,"Approve")
    );
}

echo $this->table->generate($tableData);

?>
