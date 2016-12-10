<html>
    <head>
        <title> SelfFeed Admin </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/main_admin.css">
        
        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato');
        </style>
        <script>
            var x = 0;
            var ingredients = [];
            
            function preview_image(){
                var reader = new FileReader();
                var uploaded_picture = document.querySelector('input[type=file]').files[0];
                
                reader.onload = function(image){                     
                            document.getElementById("image_show").src = image.target.result;
                };
                
                if(uploaded_picture){
                    reader.readAsDataURL(uploaded_picture);
                }
            };
            
            $(document).ready(function(){
                
                $("#ingredient_input").keyup(function(){
                    var text_input = $('#ingredient_input').val();
                    
                    $.ajax({
                        type : "POST",
                        url : "<?php echo base_url(); ?>index.php/admin_panel_ingredients/search",
                        data : {input : text_input},
                        success : function(result){
                                          var result = JSON.parse(result);
                                          $('.output_panel li').remove();
                                          console.log(result);
                                          if(result.result.length > 0){  
                                              for(x = 0; x < result.result.length; x++){
                                                 $('.output_panel').append('<li onclick="add_ingredient(this.value)" value="' + result.result[x].id + '"' + 'id="output_' + result.result[x].id + '"' + 'class="search_result">' + result.result[x].name + '</li>');
                                              }
                                          }
                                          
                        }
                    });      
                }); 
                
            });
            
            function add_ingredient(id){
                var id = id;
                var y = 0;
                
                // Array is correct
                ingredients.push(id);
                if(ingredients.length > 1){
                    for(y = 0; y < ingredients.length-1; y++){
                        
                        if(ingredients[y] == ingredients[ingredients.length - 1]){
                            ingredients.splice(y,1);
                            
                        }  
                       
                    }
                }
                
                if(!document.getElementById('ingredient_' +  id)){
                    $.ajax({
                            type : "POST",
                            url : "<?php echo base_url(); ?>index.php/admin_panel_ingredients/get",
                            data : {id : ingredients[y] },
                            success : function(result){
                                           var result = JSON.parse(result);
                                           $('.ingredient_ul').append('<li onclick="remove_ingredient(this.id)" value="' + result.result[0].id + '"' + 'id="ingredient_' + result.id + '"' + 'class="ingredient_arrangement">' + result.result[0].name + '</li>');  
                                           intended = document.getElementById('display_panel');
                                           hiddenInput = document.createElement('input');
                                           hiddenInput.type = 'hidden';
                                           hiddenInput.name = 'ingredients_bucket[]';
                                           hiddenInput.id = 'input_ingredient_'+ result.result[0].id;
                                           hiddenInput.value = result.result[0].id;
                                           intended.appendChild(hiddenInput);
                                        }
                        });
                
                }
               
                
            };
            
            function remove_ingredient(id){
                $("#" + id).remove();
                $("#input_" + id).remove();
            };
          
            
          
            
            
            
            
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="top_nav">
                Selffeed Admin
                <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Access/logout"><img id="logout_button" src="<?php echo base_url();?>./Image/exit.png"/></a>
            </div>
           
            <div class="side_nav">
                <ul>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Products/"><li>Products</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Ingredients/"><li>Ingredients</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Members/"><li>Members</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Subscribers/"><li>Subscribers</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Admins/"><li>Admin</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Transactions/"><li>Transactions</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Careers/"><li>Job Vacancy</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Applicants/"><li>Applicant</li></a>
                    <a href="<?php echo base_url();?>index.php/Admin_Panel_Store_Status/"><li>Store Status</li></a>
                </ul>
            </div>