<?php

    //     // $a1 = $_POST['a1'];
    //     // $b1 = $_POST['b1'];

    //     // print_r($_POST);


    //     // echo "hai ini python";
    //     // $coba="haiiiiii";
    //     // $command=exec("/extractor/chatbot_training.py")
    //     $command = escapeshellcmd("python3 ./chatbot_training.py");
    //     $output = shell_exec($command);
    //     echo $output;

    // }
    
        $command = escapeshellcmd('python ../../../chatbot_training.py');
        // $command = escapeshellcmd('python3 ./chatbot_training.py');
        $output = shell_exec($command);
        echo $output;
?>