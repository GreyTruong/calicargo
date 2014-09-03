 </section>
    </section>
  </section>
  <script src="<?php echo HelperUrl::baseUrl()?>js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo HelperUrl::baseUrl()?>js/bootstrap.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/bootstrapValidator.min.js"></script>
  <!-- Angular -->
  <script src="<?php echo HelperUrl::baseUrl()?>js/angular.min.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/angular-route.min.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/angular-resource.min.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/angular-sanitize.min.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/angular-ui.js"></script>
  <!-- App -->
  <script src="<?php echo HelperUrl::baseUrl()?>js/service.js"></script>
  <script type="text/javascript">
  app.run(function($rootScope, $templateCache, utility) {
    //set error messages as global variables
    $rootScope.default_error_msg = utility.default_error_msg;
    $rootScope.default_success_msg = utility.default_success_msg;
    $rootScope.baseUrl = utility.baseUrl;
  });
  app.config(function (utilityProvider, orderProvider) {
    utilityProvider.setDefaultErrorMsg("SOMETHING WENT WRONG. PLEASE TRY AGAIN LATER");
    utilityProvider.setDefaultSuccessMsg("ACTION COMPLETED SUCCESSFULLY");            
    utilityProvider.setBaseUrl("<?php echo HelperUrl::baseUrl(); ?>");
    orderProvider.setEditUrl("<?php echo HelperUrl::baseUrl() . 'ship-order-update/'; ?>");
    orderProvider.setViewOrderTitle("Shipping Order Management");
  });
  </script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/scripts.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/controller.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/app.js"></script>  
  <script src="<?php echo HelperUrl::baseUrl()?>js/app.plugin.js"></script>
  <script src="<?php echo HelperUrl::baseUrl()?>js/slimscroll/jquery.slimscroll.min.js"></script>

</body>
</html>