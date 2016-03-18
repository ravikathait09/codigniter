  <!-- End login container -->
        <div class="container">
            <div class="footer">
                <p class="text-center">&copy;<?php echo date('Y'); ?> Copyright My Sun.admin. All right reserved !!!</p>
            </div>
        </div>
        <!-- Javascripts -->
        <!-- Important javascript libs(put in all pages) -->
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="<?=base_url('asset/admin')?>/asset/js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
        window.jQuery || document.write('<script src="<?=base_url('asset/admin')?>/asset/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="<?=base_url('asset/admin')?>/js/bootstrap/bootstrap.js"></script>
        <!-- Form plugins -->
        <script src="<?=base_url('asset/admin')?>/plugins/forms/validation/jquery.validate.js"></script>
        <script src="<?=base_url('asset/admin')?>/plugins/forms/validation/additional-methods.min.js"></script>
        <!-- Init plugins olny for this page -->
        <script src="<?=base_url('asset/admin')?>/js/pages/login.js"></script>
    </body>
</html>