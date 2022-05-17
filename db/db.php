<?php

    $conn=mysqli_connect('localhost','root','','my_site');
    if (!$conn)
    {
        echo 'Connection Error'.mysqli_connect_error();
    }

?>