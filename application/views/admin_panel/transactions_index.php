       <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="11" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Transactions</h1></td>
                        
                         <div class="delete_button_location">
                                 <button type="submit" style="background-color : maroon;">Delete</type>
                         </div>
                       
                    </tr>
                    <tr>
                        <td> No </td>
                        <td> User Id </td>
                        <td> Product Id</td>    
                        <td> Quantity</td>
                        <td> Price </td>
                        <td> Status </td>
                        <td> Transaction Date </td>
                        <td> Request Date </td>
                        <td> Location </td>
                        <td> Edit </td>
                        <td> Delete </td>              
                    </tr>
                    <?php foreach($transactions as $transaction){ ?>
                    <tr>
                        <td><?php echo $number++; ?></td>
                        <td><?php echo $transaction->user_id; ?></td>
                        <td><?php echo $transaction->product_id; ?></td>
                        <td><?php echo $transaction->quantity; ?></td>
                        <td><?php echo $transaction->price; ?></td>
                                <?php if($transaction->transaction_status == 1) { ?>
                                    <td>Failed</td>
                                 <?php } else if($transaction->transaction_status == 2){ ?>
                                    <td>Success</td>
                                 <?php } else if($transaction->transaction_status == 3) { ?>
                                    <td>Processing</td>
                                 <?php } else if($transaction->transaction_status == 4) { ?>
                                    <td>Pending</td>
                                 <?php } else if($transaction->transaction_status == 5) { ?>
                                    <td>Unprocessed</td>
                                 <?php } else if($transaction->transaction_status == 6) { ?>
                                    <td>Canceled</td>
                                 <?php } ?>
                        <td><?php echo $transaction->transaction_date; ?></td>
                        <td><?php echo $transaction->delivery_request; ?></td>
                        <td><?php echo $transaction->delivery_location; ?></td>
                        <td> <a class="edit_link" href="<?php echo base_url(); ?>index.php/Admin_Panel_Transactions/edit/<?php echo $transaction->id; ?>">EDIT</a></td>
                        <td> <input type="checkbox" value="<?php echo $transaction->id; ?>" name="delete[]"></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        </form>