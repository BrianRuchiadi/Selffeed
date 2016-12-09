        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Add Member </h2></td>
                        </tr>
                        <tr>
                            <td> Username </td>
                            <td> <input type="text" name="member_name"  required>
                                <?php if($username_error){ ?><div class="error_message"><?php echo $username_error_message;?></div> <?php } ?></td>
                        </tr>
                        <tr>
                            <td> First Name </td>
                            <td> <input type="text" name="member_first_name"> </td>
                        </tr>
                        <tr>
                            <td> Last Name </td>
                            <td> <input type="text" name="member_last_name"> </td>                     
                        </tr>
                        <tr>
                            <td> Email </td>
                            <td> <input type="email" name="member_email"  required> 
                                <?php if($email_error){ ?><div class="error_message"><?php echo $email_error_message; ?></div><?php } ?></td>
                        </tr>
                        <tr>
                            <td> Password </td>
                            <td> <input type="password" name="member_password" required>
                                <?php if($password_error){ ?><div class="error_message"><?php echo $password_error_message; ?></div><?php } ?></td>
                        </tr>
                        <tr>
                            <td> Confirm password </td>
                            <td> <input type="password" name="member_password_1" required></td>
                        </tr>
                        <tr>
                            <td> Contact No </td>
                            <td> <input type="text" name="member_contact"> </td>
                        </tr>
                        <tr>
                            <td> Address </td>
                            <td> <textarea name="member_address">
                                </textarea></td>
                        </tr>
                        <tr>
                            <td> City </td>
                            <td> <input type="text" name="member_city"> </td>                    
                        </tr>
                        <tr>
                            <td> Post Code </td>
                            <td> <input type="number" name="member_post_code"> </td>
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
                            <td colspan="2"><button class="btn-success">Add </button></td>
                        </tr>
                    </table>
            </div>
        </div>
        </form>