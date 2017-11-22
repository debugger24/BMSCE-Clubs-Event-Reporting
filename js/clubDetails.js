$('document').ready(function() {
    $.ajax({
        type: 'GET',
        url: "api/getClubs.php",
        data: {
            "clubName": getUrlParameter("name")
        },
        contentType: false,
        processData: true,
        dataType: "json",
        success: function(result) {
            if (result.result.status == "success") {

                console.log(result);

                var clubTitle = $('#clubName');
                var clubURL = $('#eventWebsite');
                var clubDetails = $('#clubDetails');

                var clubContactWidget = $('#contactWidget');
                var clubEventsWidget = $('#recentEventsWidget');

                clubTitle.text(result.result.club.ClubName);
                clubURL.text(result.result.club.Website);
                clubURL.attr("href", result.result.club.Website);
                clubDetails.html(result.result.club.Details);

                if (result.result.club.EmailID != null) {
                    $('<i class="fa fa-envelope" aria-hidden="true"></i>&emsp;<a href="mailto:' + result.result.club.EmailID + '">' + result.result.club.EmailID + '</a><br>').appendTo(clubContactWidget);
                }

                if (result.result.club.ContactNumber != null) {
                    $('<i class="fa fa-phone" aria-hidden="true"></i>&emsp;<a href="tel:' + result.result.club.ContactNumber + '">' + result.result.club.ContactNumber + '</a>').appendTo(clubContactWidget);
                }

                // clubURL.text(result.result.club.ClubName);
                // eventAdded.text("Posted on " + result.result.event.Added);

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
