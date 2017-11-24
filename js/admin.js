var loadEventListByClubName = function loadEventListByClubName() {
    $.ajax({
        type: 'GET',
        url: "api/getEvents.php",
        contentType: false,
        processData: true,
        dataType: "json",
        success: function(result) {
            if (result.result.status == "success") {
                console.log(result);
                var eventsList = $.map(result.result.events, function(event, i) {
                    var row = $('<tr></tr>');
                    $('<th scope="row">' + (i+1) + '</th>').appendTo(row);
                    $('<td>' + event.Title + '</td>').appendTo(row);
                    $('<td>' + event.FromDate + '</td>').appendTo(row);
                    $('<td><a href="">Edit</a></td>').appendTo(row);
                    return row;
                });
                $('#eventListByClubName').html(eventsList);
            } else if (result.status == "failed") {
                alert(result.message);
            } else {
                alert("Failed: Please contact admin.");
            }
        },
        error: function(result) {
            alert('Failed ' + result);
        },
        timeout: 5000
    });
}
