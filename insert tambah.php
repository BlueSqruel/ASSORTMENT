<?php

//insert.php;

if(isset($_POST["item_category"]))
{
 include('../connection/database_connection.php');
 $data1 = $_POST["item_name"];

 for($count = 0; $count < count($_POST["item_category"]); $count++)
 {

  $data = ARRAY(
   //':item_name' => $_POST["item_name"][$count],
   ':item_category_id'  => $_POST["item_category"][$count],
   ':item_sub_category_id' => $_POST["item_sub_category"][$count]
  );

  $query = "
   INSERT INTO mapping_tambah
       (item_name, item_category_id, item_sub_category_id) 
       VALUES ('$data1', :item_category_id, :item_sub_category_id)
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);
 }

 echo 'ok';
} // end if

?>
