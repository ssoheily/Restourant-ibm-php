//diese seite wurde nicht benutzt in projrct
 
<form method="get">
	<div class="row">
		<div class="col-md-12">
			<label>Products </label>

			<input type="text" name="" class="form-control" onkeypress="prod_search(this.value);">
			<select multiple class="form-control products" name="products[]" id="products">
			<?php
				$prodsql = "SELECT * FROM products";
				$prodres = mysqli_query($connection, $prodsql);
				while($pr = mysqli_fetch_assoc($prodres)){
					if($pr['stock'] >= 1){
			 ?>
			
			  <option value="<?php echo $pr['id']; ?>"><?php echo $pr['name']." / INR".$pr['cost']; ?></option>
			</select>
		</div>
	</div>
	<br>
	<div class="row"> 
		<div class="col-md-8"></div>
		<div class="col-md-4"><p><input type="submit" value="Add Products/Services" class="btn btn-primary btn-lg"></div>
	</div>
                                
</form>
<div class="panel panel-default">
			  <div class="panel-body">
			  		<div class="row">
                            <div class="col-md-6">
                                <div class="bill-to">
                                    <p class="h5 mb-xs text-dark text-semibold"><strong>Invoiced To:</strong></p>
                                    <address>
                                        Full Name<br>
                                        Address<br>
                                        City <br>
                                        State - Zip Code<br>
                                        Country<br>
                                        Mobile<br>
                                        <strong>Email:</strong> youemail@domain.com
                                    </address>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bill-data text-right">
                                    <p class="mb-none">
                                        <span class="text-dark">Invoice Date:</span>
                                        <span class="value"><?php echo date("M d Y"); ?></span>
                                    </p>
                                    <p class="mb-none">
                                        <span class="text-dark">Due Date:</span>
                                        <span class="value"><?php echo date("M d Y"); ?></span>
                                    </p>
                                    
                                 </div>
                            </div>
                        </div>

                    <div class="table-responsive">
                        <table class="table invoice-items">
                            <thead>
                            <tr class="h4 text-dark">
                                <th id="cell-id" class="text-semibold">#</th>
                                <th id="cell-item" class="text-semibold">Item</th>

                                <th id="cell-price" class="text-center text-semibold">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="prodinv"></tr>
								<tr id="prodinv">
                                    <td>ID</td>
                                    <td class="text-semibold text-dark">Product/Service Name</td>
                                    <td class="text-center amount">Rs 100.00</td>
                                </tr>
                              
                            
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row">
                    	<div class="col-sm-4">
                    		
                    	</div>
                    	<div class="col-md-4">
                    		 <h2> Invoice Total: <span class="amount">Rs 100.00</span> </h2>
                    	</div>
                    	<div class="col-md-4">
                    		Amount Paid By : 
					  		<select name="paymentmode" class="form-control">
							  <option value="cash">Cash</option>
							  <option value="card">Card</option>
							</select>
                    	</div>
                    </div>
                   
			  </div>
	</div>