        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                <?php foreach($products as $product){ ?>
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Edit Extra Product </h2></td>
                        </tr>
                        <tr>
                            <td> Image </td>
                            <?php if($images->product_image != ''){ ?>
                            <td> <input type="file" name="product_image" id="product_image_upload" size="0" onchange="preview_image();"><div id="preview"><img src="<?php echo base_url(); ?><?php echo $images->product_image; ?>" id="image_show"></div> </td>
                            <?php } else { ?>
                            <td> <input type="file" name="product_image" id="product_image_upload" size="0" onchange="preview_image()"><div id="preview"><img src="<?php echo base_url(); ?>./Image/no_image_preview.png" id="image_show"></div></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td> Name </td>
                            <td> <input type="text" name="product_name" value="<?php echo $product->product_name; ?>" required> </td>
                        </tr>
                        <tr>
                            <td> Price </td>
                            <td> <input type="number" name="product_price" step="0.01" value="<?php echo $product->product_price; ?>" required></td>
                        </tr>
                        <tr>
                            <td> Status </td>
                            <td> <select name="product_active">
                                    <option value="1" <?php if($product->product_active == 1){ ?>selected <?php } ?>> Active </option>
                                    <option value="0" <?php if($product->product_active == 0){ ?>selected <?php } ?>> Not active </option>
                                </select>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-primary">Edit </button></td>
                        </tr>
                    </table>
                <?php } ?>
  
            </div>
        </div>
        </form>