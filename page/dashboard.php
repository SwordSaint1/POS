<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
<link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
</head>
<body>
  <div class="row">
      <div class="col s12">
   <h2 style="text-align: center;"> Welcome </h2>
   <hr>
  </div>
      <div class="col s8">
    
 <h5 style="text-align:center;"><b>Menu</b></h5> 		 


  
      <div class="col s12">
       <?php
      require '../process/conn.php';

      $query = "SELECT * FROM products";
      $stmt = $conn->prepare($query);
      $stmt->execute();

      foreach($stmt->fetchAll()as $i){
  
  echo'<div class="col s4">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title center">'.$i['product_name'].'</span>
            <h5 style="text-align:center;">'.$i['price'].'</h5>      
        </div>
        <div class="card-action center">
            <button type="button" class="btn" 
            onclick="add(&quot;'.$i['id'].'~!~'.$i['price'].'~!~'.$i['product_name'].'&quot;)">Add</button>
        </div>
      </div>
    </div>';

}
?>

  </div>
</div>






      <div class="col s4">
      	<p style="text-align:center;">  
      		      	
      </p>
      <br>
      <div class="col s12 input-field z">
      
     <table class="z-depth-1">
  <thead>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody id="transact_data">
   
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3"><b>Grand Total:</b></td>
      <td>$180</td>
    </tr>
    <tr>
        <td><button class="btn">Checkout</button></td>
    </tr>
  </tfoot>
</table>

    
      </div>
  		</div>
    </div>

<!-- JS -->
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script type="text/javascript" src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../node_modules/chart.js/dist/chart.min.js"></script>


<script type="text/javascript">
  function add(x){
    // console.log(x);
    var str = x.split('~!~');
    var id = str[0];
    var price = str[1];
    var product_name = str[2];
    console.log(id);
    console.log(price);
    $.ajax({
        url:'../process/processor.php',
        method: 'POST',
        cache: false,
        data:{
            method: 'add',
            id:x,
            price:price,
            product_name:product_name

        },success:function(i){
          console.log(i);
        }
    });

  }
</script>


</body>
</html>