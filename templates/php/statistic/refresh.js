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
});