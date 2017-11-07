<?php
    require_once __DIR__ . '/db_config.php';

    function addEvent($clubID, $eventTitle, $eventVenue, $eventFromDate, $eventToDate, $eventReport) {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

        $response['result'] = ['status' => NULL, 'message' => ''];


        $eventTitle = mysqli_real_escape_string($con, $eventTitle);
        $eventVenue = mysqli_real_escape_string($con, $eventVenue);
        $eventFromDate = mysqli_real_escape_string($con, $eventFromDate);
        $eventToDate = mysqli_real_escape_string($con, $eventToDate);
        $eventReport = mysqli_real_escape_string($con, $eventReport);

        // check for duplicates
        $myquery = "SELECT * FROM events WHERE Title = '$eventTitle' AND 'FromDate' = '$eventFromDate'";
        $result = mysqli_query($con, $myquery);
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                $response['result']['status'] = 'failed';
                $response['result']['message'] = 'Duplicate Event';
            }
            else {
                // No Duplicate, Insert New event report
                $myquery = "INSERT INTO `events`(`Title`, `Venue`, `FromDate`, `ToDate`, `Report`, `ReportedBy`)";
                $myquery .= "VALUES ('$eventTitle', '$eventVenue', '$eventFromDate', '$eventToDate', '$eventReport', $clubID);";

                $result = mysqli_query($con, $myquery);
                if($result) {
                    $response['result']['status'] = 'success';
                    $response['result']['message'] = 'Successfully added';
                }
                else {
                    $response['result']['status'] = 'failed';
                    $response['result']['message'] = 'Failed to added';
                }
            }
        }
        mysqli_close($con);
        return $response['result'];
    }


    if(isset($_POST['eventTitle']) &&
       isset($_POST['eventVenue']) &&
       isset($_POST['eventFromDate']) &&
       isset($_POST['eventToDate']) &&
       isset($_POST['eventReport'])) {
        echo json_encode(addEvent(1, $_POST['eventTitle'], $_POST['eventVenue'], $_POST['eventFromDate'], $_POST['eventToDate'], utf8_decode($_POST['eventReport'])));
    }
    else {
        $response['result']['status'] = "failed";
        $response['result']['status'] = "Invalid Requests";
        echo json_encode($response);
    }
?>
