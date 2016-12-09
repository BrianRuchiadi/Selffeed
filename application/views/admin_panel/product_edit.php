        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                <?php foreach($product as $product){ ?>
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Edit Product </h2></td>
                        </tr>
                        <tr>
                            <td> Image </td>
                            <td> <input type="file" name="product_image" id="product_image_upload" size="0" onchange="preview_image();"><div id="preview">
                                  <?php if($image_exists){ ?>
                                    <img src="<?php echo base_url(); ?><?php echo $image ?>" id="image_show">
                                  <?php }  else { ?>
                                    <img src="<?php echo base_url(); ?>./Image/no_image_preview.png" id="image_show">
                                  <?php } ?>
                                    </div>
                                </td>
                        </tr>
                        <tr>
                            <td> Product Name </td>
                            <td> <input type="text" name="product_name" value="<?php echo $product->product_name; ?>" required> </td>
                        </tr>
                        <tr>
                            <td> Product Quantity </td>
                            <td> <input type="number" name="product_quantity" value="<?php echo $product->product_quantity; ?>" min="0" value="0"> </td>
                        </tr>
                        <tr>
                            <td> Product Price </td>
                            <td> <input type="number" name="product_price" value="<?php echo $product->product_price; ?>" step="0.01" min="0" value="0"> </td>
                        </tr>
                        <tr>
                            <td> Product Description </td>
                            <td> <textarea name="product_description"><?php echo $product->product_description; ?>
                                </textarea></td>
                        </tr>
                        <tr>
                            <td> Product Brief Description </td>
                            <td> <textarea name="product_brief_description"><?php echo $product->product_brief_description; ?>
                                </textarea></td>
                        </tr>
                        <tr>
                            <td> Product Ingredients </td>
                            <td> 
                                <input type="text" id="ingredient_input">
                                <div class="ingredient_output">
                                    <ul class="output_panel">
                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Ingredients Lists </td>
                            <td class="added_ingredients">
                                <div class="ingredient_display" id="display_panel">
                                    <ul class="ingredient_ul">
                                        <?php if($ingredient_exists){
                                            foreach($ingredients as $ingredient) {?>
                                        <li onclick="remove_ingredient(this.id)" value="<?php echo $ingredient->id; ?>" id="ingredient_<?php echo $ingredient->id; ?>" class="ingredient_arrangement"><?php echo $ingredient->name; ?></li>
                                        <input type="hidden" name="ingredients_bucket[]" value="<?php echo $ingredient->id; ?>" id="input_ingredient_<?php echo $ingredient->ingredient_id; ?>">
                                        <?php } } ?>
                                    </ul>
                                </div>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-primary">Edit </button></td>
                        </tr>
                    </table>
                <?php } ?>
  
            </div>
        </div>
        </form>