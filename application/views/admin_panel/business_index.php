<form method="POST">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="13" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Business Inquiry</h1></td>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>
                        <td> Email </td>
                        <td> Inquiry </td>    
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($inquiries as $inquiry){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>
                        <td> <?php echo $inquiry->email; ?> </td>
                        <td> <?php echo $inquiry->details; ?> </td>
                        <td> <input type="checkbox" value="<?php echo $inquiry->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
</form>
        </div>