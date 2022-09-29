<?php
    function showShoppingCartHeader() {
        echo 'Winkelmand';
    }
    
    function showShoppingCart($data) {

        echo '<h3>Winkelmand:</h3>';
        if (!empty($data['cartRows'])) {
            echo '<div class="table-responsive">
                    <table class="table-bordered">
                        <tr>
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Prijs</th>
                            <th>Totaal</th>
                            <th>Verwijder</th>
                        </tr>';
                
            foreach($data['cartRows'] as $cartRow) {
                showCartRow($cartRow);
            }      
                        
            echo '<tr>
                    <td>Totaal</td>
                    <td></td>
                    <td></td>
                    <td> € '.number_format($data['total'] / 100, 2).'</td>
                    <td></td>
                  </tr>
            </table>
            </div>';
            
        } else {
                // wat als leeg
        }
    }
     function showCartRow($cartRow) {
        echo '<tr>
            <td><img src="Images/'.$cartRow['filename'].'" alt="'.$cartRow['name'].'" 
            width="50px"/><br>'.$cartRow["name"].'</td>
            <td>';
//            addActionForm("add-to-cart", "Bijwerken", "shoppingCart", $cartRow["productId"], true);
            addActionForm("decrease_quantity", "-", "shoppingCart", $cartRow["productId"]);
            echo $cartRow['quantity'];
            addActionForm("increase_quantity", "+", "shoppingCart", $cartRow["productId"]);

            echo '</td>
            <td> &euro; '.number_format($cartRow["price"] / 100, 2).'</td>
            <td> &euro; '.number_format($cartRow['subtotal'] / 100, 2).'</td><td>';
        addActionForm("delete", "Verwijder", "shoppingCart", $cartRow["productId"]);
        echo '</td></tr>';

     }
?>