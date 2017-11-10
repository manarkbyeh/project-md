$(document).ready(function() {

    $('input #datepicker').datepicker({
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        language: "nl",
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        minDate: 0
    });


});