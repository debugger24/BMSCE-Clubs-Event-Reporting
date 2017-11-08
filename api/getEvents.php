<?php
    require_once __DIR__ . '/db_config.php';

    function getEventsList() {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

        $myquery = "SELECT `Title`, `Venue`, `FromDate`, `ToDate`, `ClubName` FROM events e, clubs c WHERE C.ClubID = e.ReportedBy";
        $result = mysqli_query($con, $myquery);
        $response['result'] = ['status' => NULL, 'message' => NULL, 'events' => array()];

        if($result) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $response['result']['status'] = 'success';
                    array_push($response['result']['events'], $row);
                }
                mysqli_close($con);
                return $response;
            }
        }
        mysqli_close($con);
        return NULL;
    }

    function getEventDetail($eventID) {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

        $myquery = "SELECT `Title`, `Venue`, `FromDate`, `ToDate`, `ClubName`, `Report` FROM events e, clubs c WHERE C.ClubID = e.ReportedBy AND e.eventID = $eventID";

        $result = mysqli_query($con, $myquery);
        $response['result'] = ['status' => NULL, 'message' => NULL];

        if($result) {
            if(mysqli_num_rows($result) == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    $response['result']['status'] = 'success';
                    $response['result']['event'] = $row;
                }
                mysqli_close($con);
                return $response;
            }
        }
        mysqli_close($con);
        return NULL;
    }

    if ($_GET['eventID']) {
        echo json_encode(getEventDetail($_GET['eventID']));
    }
    else {
        echo json_encode(getEventsList());
    }

?>
