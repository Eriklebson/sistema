<?php
    header('Content-Type: application/json');
    include 'conn.php';

    $id = $_POST['id'];
    $category = $_POST['category'];

    $categorys = $conn->query("select * from type_product where name like '%$category%' order by id ASC;");

    $response = "";

    if($result = $categorys){
        while($category = $result->fetch_object()){
            $response .= "<tr> 
                        <th scope='row'>$category->id</th>
                        <td>$category->name</td>s
                    </tr>";
        }
    }
    echo json_encode($response);
?>