<?php

//index.php

include('db/connection/database_connection.php');

?>

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Listing Product SPG & MD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br />
    <div class="container">
      <h3 align="center">Listing Product SPG & MD</h3>
      <th><img src ="https://www.greenfieldsdairy.com/wp-content/uploads/2022/03/GF-Logo-small.png" alt ="Logo GF" class ="canter">
	  <h1  align ="center">X</h1>
	  <th><img src ="data:image/png;base64,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" alt ="Logo bosnet" class ="canter">
	  <style>
		img {
		display: block;
		margin-left: auto;
		margin-right: auto;
			}
</style>
          <div align="center">
            <a href="view/takeout.php"><input type="submit" name="submit" class="btn btn-info" value="TAKE OUT ITEM" />
			<a href="view/tambah.php"><input type="submit" name="submit" class="btn btn-info" value="TAMBAH ITEM" />
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
