       <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="13" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Ingredients</h1></td>
                         <div class="add_button_location">
                             <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Ingredients/add">Add</a>
                         </div>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>
                        <td> Name </td>
                        <td> Thumbnail </td>  
                        <td> Price </td>
                        <td> Edit</td>
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($ingredients as $ingredient){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>
                        <td> <?php echo $ingredient->name; ?> </td>
                        <td> <?php echo $ingredient->picture; ?> </td>
                        <td> <?php echo $ingredient->price; ?> MYR </td>
                        <td> <a class="edit_link" href="<?php echo base_url(); ?>index.php/Admin_Panel_Ingredients/edit/<?php echo $ingredient->id; ?>">EDIT</a></td>
                        <td> <input type="checkbox" value="<?php echo $ingredient->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        </form>