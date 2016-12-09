        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                <?php foreach($transaction as $transaction){ ?>
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Edit Ingredient </h2></td>
                        </tr>
                        <tr>
                            <td> Quantity </td>
                            <td> <input type="number" name="quantity" value="<?php echo $transaction->quantity ?>"  required></td>
                        </tr>
                        <tr>
                            <td> Price </td>
                            <td> <input type="number" name="price" value="<?php echo $transaction->price; ?>"  step="any" required> </td>
                        </tr>
                        <tr>
                            <td> Status </td>
                            <td> <select name="status">
                                    <option value="1" <?php if($transaction->transaction_status == 1){ ?> selected <?php } ?>>Failed</option>
                                    <option value="2" <?php if($transaction->transaction_status == 2){ ?> selected <?php } ?>>Success</option>
                                    <option value="3" <?php if($transaction->transaction_status == 3){ ?> selected <?php } ?>>Processing</option>
                                    <option value="4" <?php if($transaction->transaction_status == 4){ ?> selected <?php } ?>>Pending</option>
                                    <option value="5" <?php if($transaction->transaction_status == 5){ ?> selected <?php } ?>>Unprocessed</option>
                                    <option value="6" <?php if($transaction->transaction_status == 6){ ?> selected <?php } ?>>Canceled</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-primary">Edit </button></td>
                        </tr>
                        
                    </table>
                <?php } ?>
  
            </div>
        </div>
        </form>