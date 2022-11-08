<?php
        // function run_python_command(){
            $input_intentt = $_POST['input_intentt'];
            $option_chosenn = $_POST['option_chosenn'];

            print_r($_POST);
            // $input_intentt = "annyeong chingu";
            // $option_chosenn = "greeting"
            $command = escapeshellcmd("python adding.py $input_intentt $option_chosenn");
            // $command = escapeshellcmd('python3 ./chatbot_training.py');
            // print_r($input_intentt);
            // print_r($option_chosenn);
            

            $output = shell_exec($command);
            // $output = shell_exec('adding.py' .$input_intentt .$option_chosenn)
            echo $output;
    
        // }
        // run_python_command();
?>
