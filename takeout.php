<?php

//index.php


include('../db/connection/database_connection.php');

?>

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Delete | Listing Product SPG & MD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    
	<!-- Select2 CSS --> 
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
		<!-- Select2 JS --> 
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <body>
    <br />
    <div class="container">
      <h3 align="center">TAKEOUT | Listing Product SPG & MD</h3>
      <br />
	<img src ="https://www.greenfieldsdairy.com/wp-content/uploads/2022/03/GF-Logo-small.png" alt ="Logo GF" class ="canter">
	  <style>
		img {
		display: block;
		margin-left: auto;
		margin-right: auto;
			} 
</style>
      <h4 align="center">Enter Item Details</h4>
      <br />
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <span id="error"></span>
          <table class="table table-bordered" id="item_table">
            <thead>
			<tr>
			<th>customer</th>
			<td><select id="selUser" name="item_name"><option value="">Select Name</option><?php echo fill_select_boxing($connect, "10"); ?></select></td>
			</tr>
			<tr> 
                <th>BRAND</th>
                <th>PRODUCT</th>
                <th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Insert" />
			<br>
			<br>
			<button><class="fa fa-home"><a href="../index.php">KEMBALI</button>
			</br>
			</br>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
<script>

$(document).ready(function(){
 $("#selUser").select2();
 });

    $(document).ready(function(){
      var count = 0;
      $(document).on('click', '.add', function(){
		count++;
        var html = '';
        html += '<tr>';
       // html += '<td><select id="selUser" name="item_name[]" class="form-control item_name" ><option value="">Select Name</option><?php echo fill_select_boxing($connect, "11"); ?></select></td>';
        html += '<td><select id="item_cat" name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value="">Select Category</option><?php echo fill_select_box($connect, "0"); ?></select></td>';
        html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category'+count+'"><option value="">Select Sub Category</option></select></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        $('tbody').append(html);
		
      });

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

      $(document).on('change', '.item_category', function(){
        var category_id = $(this).val();
        var sub_category_id = $(this).data('sub_category_id');
	
        $.ajax({
          url:"../db/connection/fill_sub_category.php",
          method:"POST",
          data:{category_id:category_id},
          success:function(data)
          {
            var html = '<option value="">Select Sub Category</option>';
            html += data;
			
            $('#item_sub_category'+sub_category_id).html(html);
			
          }
        })
      });
	  
      $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';
   $('.item_name').each(function(){
        var count = 1;
        if($(this).val() == '')
        {
          error += '<p>Enter Item name at '+count+' Row</p>';
          return false;
        }
        count = count + 1;
      });

        $('.item_category').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item Category at '+count+' row</p>';
            return false;
          }

          count = count + 1;

        });

        $('.item_sub_category').each(function(){

          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item Sub category '+count+' Row</p> ';
            return false;
          }

          count = count + 1;

        });

        var form_data = $(this).serialize();

        if(error == '')
        {
          $.ajax({
            url:"../db/insert/insert takeout.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
              if(data == 'ok')
              {
                $('#item_table').find('tr:gt(1)').remove();
                $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
              }
            }
          });
        }
        else
        {
          $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }

      });
      
    });
</script>