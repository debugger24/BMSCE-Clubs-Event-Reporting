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
        url: "api/getClubs.php",
        contentType: false,
        processData: true,
        dataType: "json",
        success: function(result) {
            if (result.result.status == "success") {
                console.log(result);
                var clubsList = $.map(result.result.clubs, function(club, i) {
                    var clubCard = $('<div class="card col-md-12" style="margin: 4px"></div>');
                    var clubCardBody = $('<div class="card-body"></div>');
                    $('<h4 class="card-title">' + club.ClubName + '</h4>').appendTo(clubCardBody);
                    $('<p class="card-text">' + club.ShortDesc + '</p>').appendTo(clubCardBody);
                    $('<a href="club.php?name=' + club.ClubUniqueName + '" class="card-link">Explore</a>').appendTo(clubCardBody);
                    clubCardBody.appendTo(clubCard);
                    return clubCard;
                });
                $('#clubList').html(clubsList);
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
