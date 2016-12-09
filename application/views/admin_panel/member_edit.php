        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                <?php foreach($member as $member){ ?>
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Edit Member </h2></td>
                        </tr>
                        <tr>
                            <td> Username </td>
                            <td> <input type="text" name="member_name" value="<?php echo $member->username; ?>" required>
                                <?php if($username_error){ ?><div class="error_message"><?php echo $username_error_message;?></div> <?php } ?></td>
                        </tr>
                        <tr>
                            <td> First Name </td>
                            <td> <input type="text" name="member_first_name" value="<?php echo $member->first_name; ?>" required></td>
                        </tr>
                        <tr>
                            <td> Last Name </td>
                            <td> <input type="text" name="member_last_name" value="<?php echo $member->last_name; ?>"> </td>
                        </tr>     
                        <tr>
                            <td> Email </td>
                            <td> <input type="email" name="member_email" value="<?php echo $member->email; ?>" required> 
                                <?php if($email_error){ ?><div class="error_message"><?php echo $email_error_message; ?></div><?php } ?></td>
                        </tr>
                        <tr>
                            <td> Contact No </td>
                            <td> <input type="text" name="member_contact" value="<?php echo $member->contact_no; ?>"> </td>
                        </tr>
                        <tr>
                            <td> Address </td>
                            <td> <textarea name="member_address"><?php echo $member->address ?>
                                </textarea></td>
                        </tr>
                        <tr>
                            <td> City </td>
                            <td> <input type="text" name="member_city" value="<?php echo $member->city; ?>" required> </td>               
                        </tr>
                        <tr>
                            <td> Post Code</td>
                            <td> <input type="number" size="6" name="member_post_code" value="<?php echo $member->post_code; ?>" required> </td>
                        </tr>
                        <tr>
                            <td> State </td>
                            <td>  <select name="state" id="state_input">
                                            <option value="johor"> Johor </option>
                                            <option value="kedah"> Kedah </option>
                                            <option value="kelantan"> Kelantan </option>
                                            <option value="malacca"> Malacca </option>
                                            <option value="negeri_sembilan"> Negeri Sembilan </option>
                                            <option value="pahang"> Pahang </option>
                                            <option value="penang"> Penang </option>
                                            <option value="perak"> Perak </option>
                                            <option value="perlis"> Perlis </option>
                                            <option value="sabah"> Sabah </option>
                                            <option value="sarawak"> Sarawak </option>
                                            <option value="selangor" selected> Selangor </option>
                                            <option value="terengganu"> Terengganu </option>
                                </select> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-primary">Edit </button></td>
                        </tr>
                    </table>
                <?php } ?>
  
            </div>
        </div>
        </form>