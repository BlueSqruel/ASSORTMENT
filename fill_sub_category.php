<?php

//fill_sub_category.php

include('database_connection.php');

echo fill_select_box($connect, $_POST["category_id"]);
echo fill_select_boxing($connect, $_POST["cust_id"]);
?>