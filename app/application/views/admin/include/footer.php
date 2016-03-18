 <!-- End #content -->
            <div id="footer" class="clearfix sidebar-page right-sidebar-page">
                <!-- Start #footer  -->
                <p class="pull-left">
                    Copyrights &copy; 2014 <a href="http://suggeelson.com/" class="color-blue strong" target="_blank">SuggeElson</a>. All rights reserved.
                </p>
                <p class="pull-right">
                    <a href="#" class="mr5">Terms of use</a>
                    |
                    <a href="#" class="ml5 mr25">Privacy police</a>
                </p>
            </div>
            <!-- End #footer  -->
        </div>
        <!-- / #wrapper -->
        <!-- Back to top -->
        <div id="back-to-top"><a href="#">Back to Top</a>
        </div>
        <!-- Javascripts -->
        <!-- Load pace first -->
        <script src="plugins/core/pace/pace.min.js"></script>
        <!-- Important javascript libs(put in all pages) -->
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="<?=base_url('asset/admin')?>/js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
        window.jQuery || document.write('<script src="<?=base_url('asset/admin')?>/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="<?=base_url('asset/admin')?>/js/libs/jquery-migrate-1.2.1.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="<?=base_url('asset/admin')?>/js/bootstrap/bootstrap.js"></script>
        <!-- Core plugins ( not remove ) -->
        <script src="<?=base_url('asset/admin')?>/js/libs/modernizr.custom.js"></script>
        <!-- Handle responsive view functions -->
        <script src="<?=base_url('asset/admin')?>/js/jRespond.min.js"></script>
        <!-- Custom scroll for sidebars,tables and etc. -->
        <script src="<?=base_url('asset/admin')?>/plugins/core/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?=base_url('asset/admin')?>/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
        <!-- Remove click delay in touch -->
        <script src="<?=base_url('asset/admin')?>/plugins/core/fastclick/fastclick.js"></script>
        <!-- Increase jquery animation speed -->
        <script src="<?=base_url('asset/admin')?>/plugins/core/velocity/jquery.velocity.min.js"></script>
        <!-- Quick search plugin (fast search for many widgets) -->
        <script src="<?=base_url('asset/admin')?>/plugins/core/quicksearch/jquery.quicksearch.js"></script>
        <!-- Bootbox fast bootstrap modals -->
        <script src="<?=base_url('asset/admin')?>/plugins/ui/bootbox/bootbox.js"></script>
        <!-- Other plugins ( load only nessesary plugins for every page) -->
     
        <script src="<?=base_url('asset/admin')?>/plugins/ui/waypoint/waypoints.js"></script>
        <script src="<?=base_url('asset/admin')?>/plugins/forms/autosize/jquery.autosize.js"></script>
        <script src="<?=base_url('asset/admin')?>/js/jquery.supr.js"></script>
        <script src="<?=base_url('asset/admin')?>/js/main.js"></script>
		 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.js"></script>
		<script src="<?=base_url('asset/admin')?>/plugins/forms/validation/jquery.validate.js"></script>
      

       
	<script>


	clearhref();
	function clearhref(){
		
	$(".pagination li a").each(function(){
		var first=$(this).attr('data-ci-pagination-page');
		str="";
		if(first==1)
		{
			var href=	$(this).attr('href');
			str='runajax("'+href+'/0/1")';
			$(this).attr('onclick',str);
		}else
		{
			var href=	$(this).attr('href');	
			if(href!=='#'){
				str='runajax("'+href+'/1")';
				$(this).attr('onclick',str);
			}
			
			
		}
		$(this).attr('href','javascript:void(0)');
		
		$(this).attr('data-href',href+'/1');
		//}
	});
	}
	
  /* $(".pagination li a").on('click',function(){ */
 function  runajax(href){
	$.ajax({
	   type: "POST",
	   url: href,
	   success: function(res){
		  $("#mytable").html('');
		  $("#mytable").html(res);
		  clearhref();
	   },
	   error:function(err){
		   console.log('error');
	   }
	});
  }
 function checkall(obj)
 {
	   $(".check").prop('checked', $(obj).prop("checked"));
 }
 function deletesingle(url)
 {
	 //if(confirm("Are you sure to delete?"))
	 {
		 	$.ajax({
			type: "POST",
			url: url,
			success: function(res){
				
			myurl=getdisabledurl();
			
			runajax(myurl);
			},
			error:function(err){
			console.log('error');
		
			}
			});
		 
	 }
 }

 function getdisabledurl()
 {
	 /*$( ".pagination li :last-child a" )
	 {
		 var lasturl=$(this).attr('data-href');
	 }
	 */
	 page=1;
	 $(".pagination li a").each(function(){
		 if($(this).attr('class','checked'))
		 {
			var page= $(this).html();
			
		 }
		
		
	 });
	 var url= window.location.href;
		return url+'/index/'+page+'/1';
 }
 
  $(document).on("hidden.bs.modal", function (e) {
    $(e.target).removeData("bs.modal").find(".modal-content").empty();
	$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal'); });
});


$('#startdate').datepicker();
$('#enddate').datepicker();

</script>	  
    </body>
</html>