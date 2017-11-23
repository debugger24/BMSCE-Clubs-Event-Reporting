var addEvent = function addEvent(event) {
    var form = $("form");
    var formData = new FormData(document.getElementById("eventForm"));
    console.log(formData);
    $.ajax({
        type: 'POST',
        url: "api/submitEvent.php",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(result) {
            if (result.status == "success") {
                alert("Successfully Added");
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

$('document').ready(function() {
    $('textarea').froalaEditor();
    // $('#eventToDate').datepicker();

    // $("#eventForm").on('submit', addEvent);
});
