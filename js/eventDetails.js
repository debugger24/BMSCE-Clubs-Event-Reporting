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
                var speakers = $('#speakers');
                var speakersList = $('#speakersList');
                var eventDetailsSidebarP = $('#eventDetailsSidebar');

                eventTitle.text(result.result.event.Title);
                eventClub.text(result.result.event.ClubName);
                eventAdded.text("Posted on " + result.result.event.Added);
                eventDetails.html(result.result.event.Report);

                // Speakers
                if (result.result.event.speakers.length == 0) {
                    speakers.css("display", "none");
                }
                else {
                    $.each(result.result.event.speakers, function(index, speaker) {
                        $('<li><strong>' + speaker.SpeakerName + '</strong><br>' + speaker.SpeakerDesignation + '</li>').appendTo(speakersList)
                    });
                }

                // Event Details
                var eventDetailsSidebar = "";

                // Venue
                eventDetailsSidebar += "<strong>Venue : </strong>" + result.result.event.Venue + "<br>";

                // Event Date
                var fromDate = new Date(result.result.event.FromDate);
                var toDate = new Date(result.result.event.ToDate);

                if ((fromDate.getFullYear() == toDate.getFullYear()) && (fromDate.getMonth() == toDate.getMonth()) && (fromDate.getDate() == toDate.getDate())) {
                    eventDetailsSidebar += "<strong>Date : </strong>" + fromDate.getDate() + " " + getMonthName(fromDate.getMonth()) + " " + fromDate.getFullYear() + "<br>";
                }
                else if ((fromDate.getFullYear() == toDate.getFullYear()) && (fromDate.getMonth() == toDate.getMonth())) {
                    eventDetailsSidebar += "<strong>Date : </strong>" + fromDate.getDate() + " to " + toDate.getDate() + " " + getMonthName(fromDate.getMonth()) + " " + fromDate.getFullYear() + "<br>";
                }
                else if ((fromDate.getFullYear() == toDate.getFullYear())) {
                    eventDetailsSidebar += "<strong>Date : </strong>" + fromDate.getDate() + " " + getMonthName(fromDate.getMonth()) + " to " + toDate.getDate() + " " + getMonthName(toDate.getMonth()) + " " + fromDate.getFullYear() + "<br>";
                }
                else {
                    eventDetailsSidebar += "<strong>Date : </strong>" + fromDate.getDate() + " " + getMonthName(fromDate.getMonth()) + " " + fromDate.getFullYear() + " to " + toDate.getDate() + " " + getMonthName(toDate.getMonth()) + " " + toDate.getFullYear()  + "<br>";
                }

                // Event Category
                eventDetailsSidebar += "<strong>Category : </strong>" + result.result.event.Category + "<br>";
                eventDetailsSidebarP.html(eventDetailsSidebar);

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
