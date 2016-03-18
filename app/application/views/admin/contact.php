<?php if($ajax==0){ 
$search = $this->session->userdata('user_search'); 


?>
<div id="content" class="page-content clearfix">


  <div class="contentwrapper">
   <div class="heading">
		<!--  .heading-->
		<h3>Manage Contact</h3>
		
		<div class="search">
			<!-- .search -->
			<form id="searchform" class="form-horizontal" action="search.html">
				<input type="text" class="top-search from-control" placeholder="Search here ..." />
				<input type="submit" class="search-btn" value="" />
			</form>
		</div>
                        
    </div>
	<div class="row mb25">
		<form action="" method="post">
				<div class="mt m25">	
					<div class="col-md-4">
						<input type="text" placeholder="Enter Email" name="email" id="vendorCode" class="form-control" value="<?=isset($search['email'])?$search['email']:''?>">
					</div>
					<div class="col-md-4">
						<input type="text" id="startdate" placeholder="Start Date" name="start" class="form-control" value="<?=isset($search['start'])?$search['start']:''?>">
					</div>
					<div class="col-md-4">
						<input type="text" id="enddate" placeholder="End Date" name="end" class="form-control" value="<?=isset($search['end'])?$search['end']:''?>">
					</div>
				</div>
				 <div class="clearfix"></div>
				<div class="mt m25">	
								<div class="col-md-4">
										
								</div>
								<div class="col-md-4">
									
								</div>
								<div class="col-md-4">
									<button class="btn btn-success" name="search" value="search" type="submit">Search&nbsp;<i class="fa fa-search"></i></button>
									<button class="btn btn-primary" type="button">Refresh Search&nbsp;<i class="fa fa-refresh"></i></button>
									<a href="<?=base_url('admin/newsletter/csv')?>"<button class="btn btn-info" type="button">Export&nbsp;<i class="fa fa-share-square-o"></i></button></a>
									<!--<a href="<?=base_url('admin/user/adduser/1/0')?>" class="btn  btn-primary" data-toggle="modal" data-target="#myModal">Add User&nbsp;<i class="fa fa-share-square-o"></i></a>-->
								</div>
				 </div>
				<div class="clearfix"></div>
		</form>
	</div>
    <div class="row">
		 <div class="col-lg-12">
                            <!-- col-lg-12 start here -->
                            <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Manage User</h4>
                                </div>
                                <div class="panel-body" id="mytable">
								<?php } ?>
                                    <table id="table-object" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th class="per5">
                                                    <div class="checkbox-custom">
                                                        <input type="checkbox" value="option1" id="masterCheck" onclick="checkall(this)" class="check-all">
                                                        <label for="masterCheck"></label>
                                                    </div>
                                                </th>
                                               <!-- <th>Id</th>-->
                                                <th>Email</th>
												<th>Name</th>
												<th>PHone</th>
												<th>Msg</th>
												<th>Action</th>
                                               
                                            </tr>
                                        </thead>
										<?php $i=0; foreach($result as $key=>$value){ $i++;?>
										<tr>
												<td>
                                                    <div class="checkbox-custom">
                                                        <input type="checkbox" value="option2" class="check" id="check">
                                                        <label for="check"></label>
                                                    </div>
                                                </td>
                                                <!--<td><?php echo $i ?></td>-->
                                                <td><?php echo $value['email']; ?></td>
												<td><?php echo $value['name']; ?></td>
												<td><?php echo $value['phone']; ?></td>
												<td><?php echo substr($value['msg'],0,100); ?></td>
												  
												<td>
												
													
													<a href="<?=base_url('admin/contact/viewcontact/1/'.$value['id'])?>" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></a>
													
													<a href="<?=base_url('admin/delete/deletecontact/'.$value['id'])?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
												</td>
                                               
                                            </tr>
										
										<?php } ?>
                                       
                                    </table>
								
									<div id="">
										<ul class="pull-right pagination">       
											<?=$paging?>
										</ul>
									</div>
								<?php if($ajax==0){ ?>
                                </div>
                            </div>
                            <!-- End .panel -->
                  </div>
	</div>
  </div>
  
</div>
  <?php } ?>
  
   <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
