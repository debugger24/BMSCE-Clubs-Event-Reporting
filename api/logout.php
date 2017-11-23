<?php
    session_start();
    if (session_destroy()) {
        $result = array();
        $result['status'] = "true";
        echo json_encode($result);
    }
    else {
        $result = array();
        $result['status'] = "false";
        echo json_encode($result);
    }
?>
