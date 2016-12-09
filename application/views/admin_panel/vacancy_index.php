       <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="6" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Jobs</h1></td>
                         <div class="add_button_location">
                             <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Careers/add">Add</a>
                         </div>
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>
                        <td> Job Name </td>
                        <td> Job Description </td>  
                        <td> Status </td>
                        <td> Edit</td>
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($vacancies as $vacancy){ ?>
                    <tr>
                        <td> <?php echo $number++; ?></td>
                        <td> <?php echo $vacancy->job_name; ?> </td>
                        <td> <?php echo $vacancy->job_description; ?> </td>
                        <?php if($vacancy->active == 1){ ?>
                        <td> Active </td>
                        <?php } else { ?>
                        <td> Not Active </td>
                        <?php } ?>
                        <td> <a class="edit_link" href="<?php echo base_url(); ?>index.php/Admin_Panel_Careers/edit/<?php echo $vacancy->id; ?>">EDIT</a></td>
                        <td> <input type="checkbox" value="<?php echo $vacancy->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        </form>