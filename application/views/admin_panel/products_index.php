        <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="7" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Products</h1></td>
                         <div class="add_button_location">
                             <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Products/add">Add</a>
                         </div>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>
                        <td> Name </td>
                        <td> Quantity </td>
                        <td> Price </td>
                        <td> Upload Date </td>
                        <td> Edit</td>
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($products as $product){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>
                        <td> <?php echo $product->product_name; ?> </td>
                        <td> <?php echo $product->product_quantity; ?> </td>
                        <td> <?php echo $product->product_price; ?> </td>
                        <td> <?php echo $product->upload_date; ?> </td>
                        <td> <a class="edit_link" href="<?php echo base_url(); ?>index.php/Admin_Panel_Products/edit/<?php echo $product->product_id; ?>">EDIT</a></td>
                        <td> <input type="checkbox" value="<?php echo $product->product_id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        </form>