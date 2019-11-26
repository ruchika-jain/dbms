<!doctype html>
<html lang="en">

    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> SIR MVIT CHEMISTRY LAB | HOME</title>
    <link rel="stylesheet" type="text/css" href="static/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="static/addstyles.css">
</head>


<body style="background: white;">

    <div class="custom-padding">
            <nav>
                <div class="logo"><img src = "static/smvitlogo.png" width = "45px", height = "30px"></div>
                

                <ul class="menu-area">
                    
                    <li><a href= "home.html" >Home</a></li>
                    <li><a href= "chemicals.php" >Chemicals</a></li>
                    <li><a href="/instruments">Instruments</a></li>
                    <li><a href={{ url_for('glassware') }}>Glassware</a></li>
                    <li><a href="/suppliers">Suppliers</a></li>
                    <li><a href="javascript:window.close();">Logout</a></li>
                </ul>
            </nav>
    </div>
    <div class="container">
        <section id="addnew">
            <form action="query.php" method="POST">
			<h6 class="text-center heading">ADD NEW CHEMICAL</h6>
				<label>Chemical Name</label>
                <input type="text" name="name" id="name" placeholder="Enter chemical name"><br>
                <hr class="formhr">
                <label>Chemical Formula</label>
                <input type="text" name="formula" id="formula" placeholder="Enter chemical formula"><br>
                <hr class="formhr">
                <label>Chemical Stock</label>
                <input type="text" name="stock" id="stock" placeholder="Enter stock available"><br>
                <hr class="formhr">
                <button type="submit" name="save" class="but addsub" style="display: block;margin: 0 auto;width: -webkit-fill-available;">Submit</button>
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
    <div class="container">
    <table class="table" style="margin-top:35px;">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Formula</th>
            <th scope="col">Stock</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <form action="query.php" method="POST">
            <?php
               
               $squery="SELECT * FROM chemicals";
               $result=$conn->query($squery);
               $x=1;
               while($row=$result->fetch_assoc()):               
                
                
            ?>
            <tr> 
                <td><?= $row['slno']; ?> </td>
                <td><?= $row['name']; ?> </td>
                <td><?= $row['formula']; ?> </td>
                <td><?= $row['stock']; ?> </td>
                <td>
                    <button type="submit" name="delete" value="<?= $row['slno']; ?>" class="btn btn-danger"> Delete</button>
                    <button type="submit" name="edit" value="<?= $x; $x++;?>" class="btn btn-primary"> Edit</button>
               </td>
            </tr>   
               <?php endwhile; ?>
            </form>
            
            
        </tbody>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").remove();
        },3000);

        $(".btn-primary").click(function(){
            $(".table").find('tr').eq(this.value).each(function(){
                $("#name").val($(this).find('td').eq(1).text());
                $("#formula").val($(this).find('td').eq(2).text());
                $("#stock").val($(this).find('td').eq(3).text());
                $(".addsub").val($(this).find('td').eq(0).text());
            });
            $(".addsub").attr("name","edit");
        });
    });
    </script>
</body>
</html>
