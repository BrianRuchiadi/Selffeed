        <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="9" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Applicants</h1></td>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>
                        <td> First Name </td>
                        <td> Last Name </td>
                        <td> Email </td>
                        <td> Contact No </td>
                        <td> LinkedIn </td>
                        <td> Read Status </td>
                        <td> Details </td>
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($applicants as $applicant){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>
                        <td> <?php echo $applicant->firstName; ?> </td>
                        <td> <?php echo $applicant->lastName; ?> </td>
                        <td> <?php echo $applicant->email; ?> </td>
                        <td> <?php echo $applicant->phone; ?> </td>
                        <td> <?php echo $applicant->linkedIn; ?> </td>
                        <?php if($applicant->read == 1){ ?>
                        <td> Read </td>
                        <?php } else { ?>
                        <td> Unread </td>
                        <?php } ?>
                        <td> <a class="edit_link" href="<?php echo base_url(); ?>index.php/Admin_Panel_Applicants/details/<?php echo $applicant->id; ?>">DETAILS</a></td>
                        <td> <input type="checkbox" value="<?php echo $applicant->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        </form>