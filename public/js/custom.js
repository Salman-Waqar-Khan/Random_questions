

$(document).ready(function() {
    $('#nextButton').on('click', function() {
        var categoryId = $('#category').val();
        window.location.href = '/questions/' + categoryId;
    });
});
