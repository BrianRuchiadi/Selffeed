<html>
    <head>
        <title> SelfFeed Admin </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/main.css">
        
        <style>
            @import url('https://fonts.googleapis.com/css?family=Noto+Sans');
            @import url('https://fonts.googleapis.com/css?family=Cardo');
            @import url('https://fonts.googleapis.com/css?family=Teko');
            @import url('https://fonts.googleapis.com/css?family=Romanesco'); 
            @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300');
            @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
        </style>
     
    </head>
    <body>
        <div class="wrapper">
            <div class="admin_login_background">
                <div class="admin_login_box">
                    <form method="POST">
                    <table class="table" id="admin_access_table" >
                        <tr>
                            <td colspan="2"><h1 style="text-align: center"> LOGIN </h1></td>
                        </tr>
                        <tr>
                            <td> Username </td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td> Password </td>
                            <td><input type="password" name="password">
                                <?php if($error){ ?><div class="error_message"><?php echo $error_message; ?></div><?php } ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button id="admin_access_button">Login</button></td>
                        </tr>
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>