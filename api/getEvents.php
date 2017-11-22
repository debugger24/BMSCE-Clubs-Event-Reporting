<?php
    require_once __DIR__ . '/db_config.php';

    function getEventsList() {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

        $myquery = "SELECT E.EventID, E.Title, E.Venue, E.FromDate, E.ToDate, E.Report, E.Added, E.LastEdit, E.ReportedBy, GROUP_CONCAT(C.ClubName) AS ClubName FROM events E, clubs C, eventClubAssociation A WHERE E.EventID = A.EventID AND A.ClubID = C.ClubID GROUP BY E.EventID";
        $result = mysqli_query($con, $myquery);
        $response['result'] = ['status' => NULL, 'message' => NULL, 'events' => array()];

        if($result) {
            if(mysqli_num_rows($result) > 0) {
                $response['result']['status'] = 'success';
                while($row = mysqli_fetch_assoc($result)) {
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

        $myquery = "SELECT `Title`, `Venue`, `FromDate`, `ToDate`, `ClubName`, `Report`, `Added` FROM events e, clubs c WHERE C.ClubID = e.ReportedBy AND e.eventID = $eventID";

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
