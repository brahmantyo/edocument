
      <!--footer start-->
<!--       <footer class="site-footer">
    <div class="text-center">
        Designed by 2014 - Alvarez.is
<a href="index.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer> -->
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="public/assets/js/jquery.js"></script>
    <script src="public/assets/js/jquery-1.8.3.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="public/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="public/assets/js/jquery.scrollTo.min.js"></script>
    <script src="public/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="public/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="public/assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="public/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="public/assets/js/gritter-conf.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var qs = this.location.href.slice(this.location.href.indexOf('?'));
            $('.sidebar-menu a').removeClass("active");
            $('a[href="'+qs+'"]').parents('li,ul').addClass('active').css('display','block');
            $('a[href="'+qs+'"]').parents('li,ul').siblings('a').addClass('active');
        });
    </script>
    <script>
        $(function() {
            $("#successMessage").delay(5000).fadeOut('slow');
            $("#errorMessage").delay(5000).fadeOut('slow');
        });
    </script>
    <!--script for this page-->
    <?php echo $data['script_bottom']; ?>


  </body>
</html>
