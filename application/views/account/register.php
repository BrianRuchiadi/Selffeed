<div class="content">
    <div class="register_wrapper">
          <div class="login_dropdown">
                <table class="table">
                    <tr>
                        <td colspan="2" style="text-align:center;"><h2> Login </h2></td>
                    </tr>
                    <tr>
                        <td> Username </td>
                        <td> <input type="text" name="username" size="15" id="username_login"></td>
                    </tr>
                    <tr>
                        <td> Password </td>
                        <td> <input type="password" name="password" size="15" id="password_login"> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn-success" onclick="submitLogin()">Login</button></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align : center;"><a href="<?php echo base_url(); ?>index.php/Account/register"> New user? Join us </a></td>
                    </tr>
                </table>
            </div>
        
            <div class="logout_dropdown">
                <table class="table">
                    <tr>
                        <td colspan="2" style="text-align:center;"><h2> Log Out </h2></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button class="btn-primary" onclick="submitLogout()">Log Out</button></td>
                    </tr>
                </table>
            </div>
        
            <div class="table-responsive">
            <form method="POST">
            <table class="table" id="user_register_table" >
            <tr>
                <td colspan="4" style="text-align: center"><h1> Register</h1></td>
            </tr>
            <tr>
                <td><span class="number">1 </span>  </td>
                <td colspan="3"><h1>Personal Information</h1></td>
            </tr>
            <tr>
                <td></td>
                <td>Email</td>
                <td> </td>
                <td>Contact No</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="email" name="email" placeholder="email" size="25" required <?php if($email_duplicate){ ?> style="background-color:red;" <?php } ?>>
                    <?php if($email_duplicate){ 
                        ?><span style="color : red;"><?php echo $email_duplicate_message; ?> </span>
                         <?php   } ?></td>
                <td></td>
                <td><input type="text" name="contact_no" placeholder="phone number" size="20"></td>
            </tr>
 
            <tr>
                <td><span class="number">2 </span>  </td>
                <td colspan="3"><h1>Account Information</h1></td>
            </tr>
            <tr>
                <td></td>
                <td>Username</td>
                <td></td>
                <td>Password</td>
            </tr>    
            <tr>
                <td></td>
                <td><input type="text" name="username" placeholder="username" size="25" required <?php if($username_duplicate){ ?> style="background-color:red;" <?php } ?>>
                    <?php if($username_duplicate){ 
                        ?><span style="color : red;"><?php  echo $username_duplicate_message; ?></span>
                     <?php  } ?></td>
                <td></td>
                <td><input type="password" name="password" placeholder="********" size="20" required <?php if($password_match_wrong){ ?> style="background-color:red;" <?php } ?>></td>
            </tr>
            <tr>
                <td></td>
                <td>Confirm Password </td>
                <td></td>
                <td></td>           
            </tr>
            <tr>
                <td></td>
                <td><input type="password" name="password_confirm" placeholder="********" size="20" required <?php if($password_match_wrong){ ?> style="background-color:red;" <?php } ?>>
                    <?php if($password_match_wrong){ 
                        ?><br> <span style="color : red;"><?php  echo $password_match_wrong_message; ?> </span>
                         <?php  }?> </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3"><button class="btn-success" type="submit">Register</button></td>
            </tr>
        </table>
        </form>
        </div>
    </div>
