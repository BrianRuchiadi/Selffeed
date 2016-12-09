        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Add Subscriber </h2></td>
                        </tr>
                        <tr>
                            <td> Email </td>
                            <td> <input type="email" name="subscriber_email"  required> 
                                <?php if($email_error){ ?><div class="error_message"><?php echo $email_error_message; ?></div><?php } ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-success">Add </button></td>
                        </tr>
                    </table>
            </div>
        </div>
        </form>