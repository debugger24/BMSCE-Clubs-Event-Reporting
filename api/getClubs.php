<?php
    require_once __DIR__ . '/db_config.php';

    function getClubs() {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

        $myquery = "SELECT `ClubID`, `ClubUniqueName`, `ClubName`, `EmailID`, `ShortDesc` ,  `Details` FROM `clubs`";
        $result = mysqli_query($con, $myquery);
        $response['result'] = ['status' => NULL, 'message' => NULL, 'clubs' => array()];

        if($result) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $response['result']['status'] = 'success';
                    array_push($response['result']['clubs'], $row);
                }
                mysqli_close($con);
                return $response;
            }
        }
        mysqli_close($con);
        return NULL;
    }

    function getClubDetails($cludUniqueName) {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

        $myquery = "SELECT `ClubID`, `ClubUniqueName`, `ClubName`, `EmailID`, `ShortDesc` , `Details` FROM clubs WHERE `ClubUniqueName` = '$cludUniqueName'";

        $result = mysqli_query($con, $myquery);
        $response['result'] = ['status' => NULL, 'message' => NULL];

        if($result) {
            if(mysqli_num_rows($result) == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    $response['result']['status'] = 'success';
                    $response['result']['club'] = $row;
                }
                mysqli_close($con);
                return $response;
            }
        }
        mysqli_close($con);
        return NULL;
    }

    if (isset($_GET['clubName'])) {
        echo json_encode(getClubDetails($_GET['clubName']));
    }
    else {
        echo json_encode(getClubs());
    }
?>
