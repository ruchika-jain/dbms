<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lexend+Mega|Saira+Extra+Condensed|Chilanka|Merriweather|Audiowide|Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="container">
        <section id="addnew">
            <form action="query.php" method="POST">
			<h6 class="text-center heading">ADD NEW CHEMICAL</h6>
				<label>Chemical Name</label>
                <input type="text" name="chemicalname" id="chemicalname" placeholder="Enter chemical name"><br>
                <hr class="formhr">
                <label>Chemical Formula</label>
                <input type="text" name="formula" id="formula" placeholder="Enter chemical formula"><br>
                <hr class="formhr">
                <label>Chemical Stock</label>
                <input type="text" name="stock" id="stock" placeholder="Enter stock available"><br>
                <hr class="formhr">
                <button type="submit" name="save" class="but addsub">Submit</button>
            </form>
		</section>
		
    </div>
    <?php require_once("query.php"); ?>
    <div class="container"> 
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="<?=$_SESSION['alert']; ?>">
                <?=$_SESSION['msg']; ?>
            </div>
        <?php endif; ?>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Sl No</th>
            <th scope="col">Name</th>
            <th scope="col">Formula</th>
            <th scope="col">Stock</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php
               
               $squery="SELECT * FROM chemicals";
               $result=$conn->query($squery);
               while($row=$result->fetch_assoc()):               
                print_r($row);
            ?>
               
               <?php endwhile; ?>
            
            
            
        </tbody>
    </table>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>