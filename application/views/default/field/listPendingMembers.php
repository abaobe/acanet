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
        anchor("fields/pendingMembers/approve/$fieldId/member" . $row->username,"Approve") . " " .
        anchor("fields/pendingMembers/approve/$fieldId/banned" . $row->username,"Deny")
    );
}

echo $this->table->generate($tableData);

?>
