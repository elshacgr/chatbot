$( document ).ready(function(){

    $("#train_btn").click(function(){
        var a="saya elsha";
        var b="saya misyel";

        var arr_data= {
            a1 : a,
            b1 : b,

        };

        console.log("Button telah ditekan");
        $.ajax({
            url: "./training_logic.php",
            type : "post",
            data : arr_data,
            success: function (response){
                if(response.includes("Helloworld")){
                    swal({
                        title: "Yeayy!!",
                        text: "EVAs Bot has been traine! Surely she is smarter than before.",
                        icon: "success",
                        timer:5000,
                        buttons:false
                    });
                    // $("#MyPopup").modal("show");
                    location.reload();
                }
                else{
                    console.log(""+response);
                    alert("Sorry, there's an error in file python");
                    location.reload();
                }
            },
            error: function(){
                alert("Sorry, error umum");
                location.reload();
            }
         });
    });

    $("#save_add").click(function(){
        // var input_intent = "hai apa kabar";
        var input_intent = $("#input_pattern").val();
        var option_chosen = $("#dropdown-data").find(":selected").val();
        
        if (input_intent == ''||option_chosen==''){
            swal({
                title: "Fields Empty!!",
                text: "Please check the missing field!!",
                icon: "warning",
                button:"Ok"
            });
        }else{
            var arr_data= {
                input_intentt : ""+input_intent,
                option_chosenn : ""+option_chosen

            };
            swal({
                title: "Success!!",
                text: "Your data has been added to data train.  Click Start Training to generate new model",
                icon: "success",
                timer:5000,
                buttons:false
            });
            
            $.ajax({
                url: "./data_train.php",
                type : "post",
                data : arr_data,
                success: function (response){
                    if(response.includes("Helloworld")){
                        console.log("hai")
                        location.reload();
        
                    }
                    else{
                        console.log(""+response);
                        alert("Sorry, there's an error in file python");
                        location.reload();
                    }
                },
                error: function(){
                    alert("Sorry, error umum");
                    location.reload();
                }
            });
            }
        });    

        // handle feature search
        $('#btn-search-table').click(function() {
            console.log("haiiiii")
            var value = $('#txt-input-search').val().toLowerCase();
            console.log("fsdf")

            $("#table-intent tr").filter(function() {
                console.log("hehehe")

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

});

