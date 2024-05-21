<?php
    include 'conn.php';

    $id = $_POST['id'];

    $user = $conn->query("select * from users where id='$id'")->fetch_object();

    $photo = $_FILES;
    $name = $_POST['name'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if(!empty($photo['photo']['name'])){
        $namePhoto = md5(date('d-m-Y h:i:s').$photo['photo']['name']).'.'.explode('.', $photo['photo']['name'])[1];
        $type = $photo['photo']['type'];
        $nameTmp = $photo['photo']['tmp_name'];
        $size = $photo['photo']['size'];

        move_uploaded_file($nameTmp, '../storage/img/perfil/'.$namePhoto);

        if(!empty($old_password) && !empty($new_password) && !empty($confirm_password)){
            if(hash('sha256', md5($old_password)) == $user->password){
                if($new_password == $confirm_password){
                    $password = hash('sha256', md5($new_password));
                    $conn->query("update users set photo='$namePhoto', name='$name', password='$password' where id='$id'");
                    header("Location: ../dashboard/settings.php?id=$id");
                }
                else{
                    echo "Password confirmation must be the same as the new password";
                }
            }
            else{
                echo "The password is wrong";
            }
        }
        else{
            $conn->query("update users set photo='$namePhoto', name='$name' where id='$id'");
            header("Location: ../dashboard/settings.php?id=$id");
        }
    }
    else{
        if(!empty($old_password) && !empty($new_password) && !empty($confirm_password)){
            if(hash('sha256', md5($old_password)) == $user->password){
                if($new_password == $confirm_password){
                    $password = hash('sha256', md5($new_password));
                    $conn->query("update users set name='$name', password='$password' where id='$id'");
                }
                else{
                    echo "Password confirmation must be the same as the new password";
                    header("Location: ../dashboard/settings.php?id=$id");
                }
            }
            else{
                echo "The password is wrong";
            }
        }
        else{
            $conn->query("update users set name='$name' where id='$id'");
            header("Location: ../dashboard/settings.php?id=$id");
            echo mysqli_error($conn);
        }
    }
    
?>