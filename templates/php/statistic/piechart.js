$(function () {
    $.get('./history_intent.txt', function (data) {

    value1 = (data.match(/price/g) || []).length;
    // console.log(value1);
 
    value2 = (data.match(/kapasitas/g) || []).length;
    console.log(value2);

    value3 = (data.match(/fasilitas/g) || []).length;
    // console.log(value3);

    value4 = (data.match(/asrama/g) || []).length;
    // console.log(value4);

    value5 = (data.match(/location/g) || []).length;
    // console.log(value5);

    value6 = (data.match(/room_model/g) || []).length;
    // console.log(value6);

    value7 = (data.match(/rules/g) || []).length;
    // console.log(value7);

    let array_value_y = [value1, value2, value3, value4, value5, value6, value7];
    // console.log(array_value)

    var intent_x = ["price", "kapasitas", "fasilitas", "asrama", "location", "room_model", "rules"];
    var values_y = array_value_y
    var barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    "#e8c3b9",
    "#1e7145"
    ];

    new Chart("myChart", {
    type: "pie",
    data: {
        labels: intent_x,
        datasets: [{
        backgroundColor: barColors,
        data: values_y
        }]
    },
    options: {
        title: {
        display: true,
        text: ""
        }
    }
    });

    });

});