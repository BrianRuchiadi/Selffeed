        <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="3" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Subscribers</h1></td>
                         <div class="add_button_location">
                             <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Subscribers/add">Add</a>
                         </div>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>                    
                        <td> Email </td>
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($subscribers as $subscriber){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>   
                        <td> <?php echo $subscriber->email; ?> </td>   
                        <td> <input type="checkbox" value="<?php echo $subscriber->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        </form>