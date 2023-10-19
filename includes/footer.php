<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<div class="footer-navigation d-block d-lg-none">
  <ul class="list-unstyled d-flex align-items-center justify-content-between">
    <li class="position-relative">
      <a href="#!" class="search-btn"><i class="fas fa-search"></i></a>
      <form id="search-bar" class="d-none">
        <input type="text" name="search" id="search" class="form-control">
      </form>
    </li>
    <li class="position-relative">
      <a href="#!" class="home-btn"><i class="fas fa-home"></i></a>
    </li>
    <li class="position-relative">
      <a href="#!" class="menu-btn"><i class="fas fa-bars"></i></a>
    </li>
    <li class="position-relative">
      <a href="#!" class="profile-btn"><i class="fas fa-user-alt"></i></a>
    </li>
  </ul>
</div>

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y') ?> <a href="#!">Multiple Calculator</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= site_url ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= site_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= site_url ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= site_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= site_url ?>dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= site_url ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= site_url ?>plugins/raphael/raphael.min.js"></script>
<script src="<?= site_url ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= site_url ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS 
<script src="< ?=site_url?>plugins/chart.js/Chart.min.js"></script>
-->
<!-- DataTables  & Plugins -->
<script src="<?= site_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= site_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= site_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= site_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= site_url ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= site_url ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= site_url ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= site_url ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= site_url ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= site_url ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= site_url ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= site_url ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- InputMask -->
<script src="<?= site_url ?>plugins/moment/moment.min.js"></script>
<script src="<?= site_url ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- dateRangePicker -->
<script src="<?= site_url ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= site_url ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="< ?=site_url?>dist/js/pages/dashboard2.js"></script>
-->
<script>
  $(document).ready(function() {
    bsCustomFileInput.init();

    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2, #example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "columnDefs": [{
        "width": "25%",
        "targets": 2
      }]
    });


    $('.footer-navigation ul').on('click', 'li a', function(e) {
      e.preventDefault();
      // $(this).addClass('active').parent().siblings().find('a').removeClass('active');
    });

    $('.search-btn').on('click', function(e) {
      e.preventDefault();
      $(this).siblings().toggleClass('d-none');
      $(this).parent().siblings().find('a').removeClass('active');
      if(!$('#search-bar').hasClass('d-none')) {
        $(this).addClass('active');
      } else {
        console.log('search has class');
        $(this).removeClass('active');
      }
    });

    $('.home-btn').on('click', function(e) {
      e.preventDefault();
      $('#search-bar').addClass('d-none');
      $(this).addClass('active').parent().siblings().find('a').removeClass('active');
    });

    $('.menu-btn').on('click', function(e) {
      e.preventDefault();
      $('#search-bar').addClass('d-none');
      $(this).addClass('active').parent().siblings().find('a').removeClass('active');
    });

    $('.profile-btn').on('click', function(e) {
      e.preventDefault();
      $('#search-bar').addClass('d-none');
      $(this).addClass('active').parent().siblings().find('a').removeClass('active');
    });

  });
</script>
</body>

</html>