<?php if($ajax==0){ 
$search = $this->session->userdata('newsletter_search'); 


?>
<div id="content" class="page-content clearfix">


  <div class="contentwrapper">
   <div class="heading">
		<!--  .heading-->
		<h3>Newsletter</h3>
		
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
                                    <h4 class="panel-title">Newsletter</h4>
                                </div>
                                <div class="panel-body" id="mytable">
								<?php } ?>
                                    <table id="table-object" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th class="per5">
                                                    <div class="checkbox-custom">
                                                        <input type="checkbox" value="option1" id="masterCheck" class="check-all" onclick="checkall(this)">
                                                        <label for="masterCheck"></label>
                                                    </div>
                                                </th>
                                               <!-- <th>Id</th>-->
                                                <th>Email</th>
												<th>Date</th>
												<th>Action</th>
                                               
                                            </tr>
                                        </thead>
										<?php $i=0; foreach($result as $key=>$value){ $i++;?>
										<tr>
												<td>
                                                    <div class="checkbox-custom">
                                                        <input type="checkbox" value="option2" class="check" id="check" >
                                                        <label for="check"></label>
                                                    </div>
                                                </td>
                                                <!--<td><?php echo $i ?></td>-->
                                                <td><?php echo $value['email']; ?></td>
												   <td><?php echo $value['curdate']; ?></td>
												<td>
												
													
													<a  onclick="delete('<?=base_url('admin/delete/deletenewsletter/'.$value['id'])?>')" href="javascript:;"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
