<?php
    function showShoppingCartHeader() {
        echo 'Winkelmand';
    }
    
    function showShoppingCart($product) {
        echo '<h3>Winkelmand:</h3>
                <div class="table-responsive">
                    <table class="table-bordered">
                        <tr>
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Prijs</th>
                            <th>Totaal</th>
                            <th>Verwijder</th>
                        </tr>';
                
        if(!empty($_SESSION["shopping-cart"])) {
            $none = 0;
            foreach($_SESSION["shopping-cart"] as $keys => $values); {
        
        
        echo '<tr>
            <td><img src="Images/'.$product['filename'].'" alt="'.$product['name'].'" 
            width="50px"><br>'.$values["productName"].'</td>
            <td>'.$values["productQuantity"].'</td>
            <td>'.$values["productPrice"].'</td>
            <td>'.number_format($values["productQuantity"] * $values["productPrice"], 2).'</td>
            <td><a href="index.php?action=delete&id='.$values["productId"].'">Remove</a></td>
            </tr>'
            
            .$total = $none + ($values["productQuantity"] * $values["productPrice"]);
            }
            echo '<tr>
                    <td>Totaal</td>
                    <td> € '.number_format($total, 2).'</td>
                    <td></td>
                  </tr>
            </table>
            </div>';
            
        }
    }
?>