/*

<div class="card" style="width: 20rem;">
    <div class="card-body">
        <h4 class="card-title">Card title</h4>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>

*/

$('document').ready(function() {
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
                    var eventCard = $('<div class="card col-md-3" style="width: 20rem;"></div>');
                    var eventCardBody = $('<div class="card-body"></div>');
                    $('<h4 class="card-title">' + event.Title + '</h4>').appendTo(eventCardBody);
                    $('<h6 class="card-subtitle mb-2 text-muted">by ' + event.ClubName + '</h6>').appendTo(eventCardBody);
                    // $('<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>').appendTo(eventCardBody);
                    $('<a href="event.php?event=' + event.EventID + '" class="card-link">Read More</a>').appendTo(eventCardBody);
                    eventCardBody.appendTo(eventCard);
                    return eventCard;
                });
                $('#eventList').html(eventsList);
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
