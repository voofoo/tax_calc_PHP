<?php

function check_login($link)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$id' limit 1";

        $result = mysqli_query($link, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to to login page
    header("Location: login.php");
    die;
}

function random_num($length)
{
    $text = "";
    if($length < 7)
    {
        $length = 7;
    }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        //

        $text .= rand(0, 9);
    }

    return $text;

}


?>