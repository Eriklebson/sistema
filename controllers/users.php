<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id = $_POST['id'];

    $users = $conn->query("select * from users;");

    $response = "";

    if($result = $users){
        while($user = $result->fetch_object()){
            if($user->id > 1){
                if($user->type_account == 1){
                    $type_account = 'Admin';
                } else if($user->type_account == 2){
                    $type_account = 'Standard';
                }
                $response .= "<tr> 
                        <th scope='row'>$user->id</th>
                        <td>$user->name</td>s
                        <td>$user->email</td>
                        <td>$type_account</td>
                        <td>
                            <a href='edituser.php?id=$id&id_user=$user->id' class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></a>
                            <button class='btn btn-danger'><i class='fa-solid fa-user-slash'></i></button>
                        </td>
                    </tr>";
            }
        }
    }
    echo json_encode($response);
?>