$(document).ready(function() {
    $('#nextButton').on('click', function() {
        console.log('Button clicked.'); // Add this line for debugging
        var categoryId = $('#category').val();
        window.location.href = '/questions/' + categoryId;
    });
});
