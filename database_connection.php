<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=assortment;", "root", "");

function fill_select_box($connect, $category_id)
{
 $query = "
  SELECT * FROM tbl_category 
  WHERE parent_category_id = '".$category_id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
 }

 return $output;
}
function fill_select_boxing($connect, $cust_id)
{
 $query = "
  SELECT * FROM tbl_customer 
  WHERE parent_cust_id = '".$cust_id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '<option value="'.$row["Kode_Bosnet"].'">'.$row["cust_name"].'</option>';
 }

 return $output;
}
?>