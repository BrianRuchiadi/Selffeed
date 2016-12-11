        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                <?php foreach($ingredient as $ingredient){ ?>
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Edit Ingredient </h2></td>
                        </tr>
                        <tr>
                            <td> Image </td>
                            <?php if($ingredient->picture != ''){ ?>
                            <td> <input type="file" name="ingredient_image" id="product_image_upload" size="0" onchange="preview_image();"><div id="preview"><img src="<?php echo base_url(); ?><?php echo $ingredient->picture; ?>" id="image_show"></div> </td>
                            <?php } else { ?>
                            <td> <input type="file" name="ingredient_image" id="product_image_upload" size="0" onchange="preview_image()"><div id="preview"><img src="<?php echo base_url(); ?>./Image/no_image_preview.png" id="image_show"></div></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td> Name </td>
                            <td> <input type="text" name="ingredient_name" value="<?php echo $ingredient->name; ?>" required> </td>
                        </tr>
                        <tr>
                            <td> Price </td>
                            <td> <input type="number" name="ingredient_price" step="0.01" value="<?php echo $ingredient->price; ?>" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-primary">Edit </button></td>
                        </tr>
                    </table>
                <?php } ?>
  
            </div>
        </div>
        </form>