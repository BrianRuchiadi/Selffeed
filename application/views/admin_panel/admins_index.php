        <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="3" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Admins</h1></td>
                         <div class="add_button_location">
                             <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Admins/add">Add</a>
                         </div>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>                    
                        <td> Username </td>    
                        <td> Delete </td>
                    </tr>
                    <?php foreach($admins as $admin){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>   
                        <td> <?php echo $admin->username; ?> </td>
                        <td> <input type="checkbox" value="<?php echo $admin->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        </form>