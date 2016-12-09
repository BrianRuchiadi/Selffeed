        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Add Admin </h2></td>
                        </tr>
                        <tr>
                            <td> Username </td>
                            <td> <input type="text" name="admin_username"  required> 
                                <?php if($username_error){ ?><div class="error_message"><?php echo $username_error_message;?></div> <?php } ?></td>
                        </tr>
                        <tr>
                            <td> Password </td>
                            <td> <input type="password" name="admin_password" required>
                                 <?php if($password_error){ ?><div class="error_message"><?php echo $password_error_message;?></div> <?php } ?></td>
                        </tr>
                        <tr>
                            <td> Password Confirm</td>
                            <td> <input type="password" name="admin_password_1" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-success">Add </button></td>
                        </tr>
                    </table>
            </div>
        </div>
        </form>