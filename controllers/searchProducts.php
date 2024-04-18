<?php
    header('Content-Type: application/json');

    include 'conn.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $users = $conn->query("select * from products where title like '%$title%' and price like '%$price%' order by id ASC;");
    
    $response = "";

    if($result = $users){
        while($user = $result->fetch_object()){
            $response .= "<tr> 
                            <th scope='row'>$user->id</th>
                            <td>$user->name</td>s
                            <td>$user->email</td>
                            <td>$type_account</td>
                            <td>
                                <a href='editproduct.php?id=$id&id_user=$user->id' class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></a>
                            </td>
                        </tr>";
        }
    }
    echo json_encode($response);
?>