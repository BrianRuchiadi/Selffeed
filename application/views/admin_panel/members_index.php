        <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="13" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Members</h1></td>
                         <div class="add_button_location">
                             <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Members/add">Add</a>
                         </div>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>
                        <td> First Name </td>
                        <td> Last Name </td>
                        <td> Username </td>
                        <td> Email </td>
                        <td> Contact No </td>
                        <td> Join Date </td>
                        <td> Address </td>
                        <td> City </td>
                        <td> State </td>
                        <td> Post Code </td>
                        <td> Edit</td>
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($members as $member){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>
                        <td> <?php echo $member->first_name; ?> </td>
                        <td> <?php echo $member->last_name; ?> </td>
                        <td> <?php echo $member->username; ?> </td>
                        <td> <?php echo $member->email; ?> </td>
                        <td> <?php echo $member->contact_no; ?> </td>
                        <td> <?php echo $member->join_date; ?> </td>
                        <td> <?php echo $member->address; ?> </td>
                        <td> <?php echo $member->city; ?> </td>
                        <td> <?php echo $member->state; ?> </td>
                        <td> <?php echo $member->post_code; ?> </td>
                        <td> <a class="edit_link" href="<?php echo base_url(); ?>index.php/Admin_Panel_Members/edit/<?php echo $member->id; ?>">EDIT</a></td>
                        <td> <input type="checkbox" value="<?php echo $member->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        </form>