// handle feature search
$( document ).ready(function(){
    $('#searchh').click(function() {
        console.log("tests");
        var value = $('#searchhh').val().toLowerCase();
        $("#table_booking tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


