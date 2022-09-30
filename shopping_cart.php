<?php
    function showShoppingCartHeader() {
        echo 'Winkelmand';
    }
    
    function showShoppingCart($data)
    {

        echo '<img class="icon" src="Images/shoppingcart.jpg" alt="Winkelwagen" width="100px" />';
        if (!empty($data['cartRows'])) {
            echo '<div class="table-responsive">
                    <table class="table-bordered">
                        <tr class="table-headers">
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Prijs</th>
                            <th>Totaal</th>
                            <th>Verwijder</th>
                        </tr>';
                
            foreach($data['cartRows'] as $cartRow) {
                showCartRow($cartRow);
            }      
                        
            echo '<tr class="total">
                    <td></td>
                    <td><b>Totaal</b></td>
                    <td></td>
                    <td></td>
                    <td><b> &euro; '.number_format($data['total'] / 100, 2).'</b></td>
                  </tr>
            </table>
            </div>';
            
            showPayButton($data);
            
        } else {
            echo '<p>Je hebt nog geen producten aan je winkelmandje toegevoegd.</p>';
        }
    }
     function showCartRow($cartRow) {
        echo '<tr class="data-row">
            <td><img src="Images/'.$cartRow['filename'].'" alt="'.$cartRow['name'].'" 
            width="50px"/><br>'.$cartRow["name"].'</td>
            <td>';
            addActionForm("add-to-cart", "Bijwerken", "shoppingCart", $cartRow["productId"], true);
            echo '</td>
            <td> &euro; '.number_format($cartRow["price"] / 100, 2).'</td>
            <td> &euro; '.number_format($cartRow['subtotal'] / 100, 2).'</td><td>';
        addActionForm("delete", "Verwijder", "shoppingCart", $cartRow["productId"]);
        echo '</td></tr>';
     }

     function showPayButton($data) {
        if (!empty ($data['cartRows'])) {
            echo '<form method="post" action="index.php">';
            echo '<input type="submit" name="pay" class="pay-button" value="Door naar afrekenen">';
            echo '<input type="hidden" name="page" value="confirm_order" />';
        }
     }
?>