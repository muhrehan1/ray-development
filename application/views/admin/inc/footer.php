<!-- partial:partials/_footer.html -->
<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
	<p class="text-muted text-center text-md-left">Copyright � <?php $year = date('Y'); echo $year ;?> <a href="<?php echo base_url();?>" target="_blank"><?php echo $this->settings->title;?></a>. All rights reserved</p>
	<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
</footer>
<style>
.popover{
	max-width: 500px !important;
	overflow: hidden;
}

.popover-body img{
	width: 100%;
	object-fit: contain;
	height:100%
}
</style>
<!-- partial -->

</div>
</div>
<script src="<?php echo base_url('assets/admin/')?>vendors/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url('assets/admin/')?>vendors/jquery.flot/jquery.flot.js"></script>
<script src="<?php echo base_url('assets/admin/')?>vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url('assets/admin/')?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('assets/admin/')?>vendors/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url('assets/admin/')?>vendors/progressbar.js/progressbar.min.js"></script>
<script src="<?php echo base_url('assets/admin/')?>vendors/feather-icons/feather.min.js"></script>
<script src="<?php echo base_url('assets/admin/')?>js/template.js"></script>
<script src="<?php echo base_url('assets/admin/')?>js/dashboard.js"></script>
<script src="<?php echo base_url('assets/admin/')?>vendors/dropify/dist/dropify.min.js"></script>
<script src="<?php echo base_url('assets/admin/')?>js/dropify.js"></script>
<script src="<?php echo base_url('assets/admin/')?>js/datepicker.js"></script>
  <script src="<?php echo base_url('assets/admin/')?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo base_url('assets/admin/')?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url('assets/admin/')?>js/data-table.js"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
  }

     $('.popover-dismiss').popover({
     	  //placement: 'top',
     	  //content: lorem,
          trigger: 'hover',
          html:       true,
          //container: '.well'
      });
</script>
</body>
</html>    
