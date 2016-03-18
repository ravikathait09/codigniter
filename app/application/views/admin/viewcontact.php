<div class="panel panel-default toggle panelMove panelClose panelRefresh" id="supr6">

	<div class="panel-heading">
		<h4 class="panel-title">View Contact</h4>
	</div>
	<div class="panel-body">
		<form role="form" id="adduser" method="post" action="<?=base_url('admin/form/adduser')?><?php if(isset($result) && $result['id']){ echo '/'.$result['id']; } ?>" class="form-horizontal">
			<div class="form-group">
				<div class="col-lg-12">
					<div class="row">
						<!-- Start .row -->
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<input type="text" placeholder="Name" name="name" value="<?php if(isset($result) && $result['name']) echo $result['name']; ?>" class="form-control required">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<input type="text" placeholder="Email" name="email"  class="form-control required email" value="<?php if(isset($result) && $result['email']) echo $result['email']; ?>">
						</div>
					</div>
					<!-- End .row -->
				</div>
			</div>
			<!-- End .form-group  -->
			<div class="form-group">
				<div class="col-lg-12">
					<div class="row">
						<!-- Start .row -->
						
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<input type="text" placeholder="Phone" name="phone" class="form-control required digit" value="<?php if(isset($result) && $result['phone']) echo $result['phone']; ?>">
							<?php if(isset($result) && $result['id']){?>
							<input type="hidden" value="<?php echo $result['id']; ?>" name="id"/>
							<?php }	?>
						</div>
						
					</div>
					<!-- End .row -->
				</div>
				
				
			</div>
			 <div class="form-group">
			 <div class="col-lg-12">
				  <textarea placeholder="Address" rows="3" id="textarea" name="address" class="form-control"><?php if(isset($result) && $result['msg']) echo $result['msg']; ?></textarea>
			   </div>
              </div>
			
			
		</form>
	</div>
</div>
