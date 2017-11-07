function addEvent(event) {
    var form = $("form");
    var formData = new FormData(document.getElementById("eventForm"));
    console.log(formData);
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(result) {
            if (result.result == "success") {
                console.log(result);
            } else if (result.result == "failed") {
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

    $("#eventForm").on('submit', addEvent);
});
