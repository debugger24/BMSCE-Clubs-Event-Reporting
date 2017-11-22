$('document').ready(function() {
    $.ajax({
        type: 'GET',
        url: "api/getEvents.php",
        data: {
            "eventID": getUrlParameter("event")
        },
        contentType: false,
        processData: true,
        dataType: "json",
        success: function(result) {
            if (result.result.status == "success") {

                console.log(result);

                var eventTitle = $('#eventTitle');
                var eventClub = $('#eventClub');
                var eventAdded = $('#eventPostDate');
                var eventDetails = $('#eventDetails');

                eventTitle.text(result.result.event.Title);
                eventClub.text(result.result.event.ClubName);
                eventAdded.text("Posted on " + result.result.event.Added);
                eventDetails.html(result.result.event.Report);

                console.log(result.result.event.eventTitle);

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
});
