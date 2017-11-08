var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

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
                    var clubCard = $('<div class="card" style="width: 20rem;"></div>');
                    var clubCardBody = $('<div class="card-body"></div>');
                    $('<h4 class="card-title">' + club.ClubName + '</h4>').appendTo(clubCardBody);
                    $('<p class="card-text">' + club.ShortDesc + '</p>').appendTo(clubCardBody);
                    $('<a href="#" class="card-link">Explore</a>').appendTo(clubCardBody);
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
