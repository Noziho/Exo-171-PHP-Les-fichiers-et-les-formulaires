<?php
require 'method.php';
foreach ($_FILES['user_file'] as $key => $value) {
    echo "$key  => $value <br>";
}

if (isset($_FILES['user_file'])) {

    if ($_FILES['user_file']['error'] === 0) {
        $allowedExtension = ['image/jpeg', 'image/png', 'image/jpg'];

        if (in_array($_FILES['user_file']['type'], $allowedExtension)) {

            $max_size = 3* 1024 * 1024;
            if ((int)$_FILES['user_file']['size'] <= $max_size) {


                $tmp_name = $_FILES['user_file']['tmp_name'];
                $name = getRandomName($_FILES['user_file']['name']);

                if (!is_dir('uploads')) {
                    mkdir('uploads', '0755');
                }

                move_uploaded_file($tmp_name, "uploads/".$name);
                header("Location: /index.php?s=0");

            }

        }
        else {
            header("Location: /index.php?f=0");
        }
    }
    else {
        header("Location: /index.php?s=0");
    }

}

