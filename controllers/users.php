<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id = $_POST['id'];

    $users = $conn->query("select * from users order by id ASC;");

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
                            <a href='edituser.php?id=$id&id_user=$user->id' class='btn btn-primary' data-bs-toggle='tooltip' data-bs-title='Editar Usuario'><i class='fa-solid fa-pen-to-square'></i></a>
                        </td>
                    </tr>";
            }
        }
    }
    echo json_encode($response);
?>