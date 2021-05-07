</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io" target="_blank">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!--para llamar los script que se hagan en un archivo js-->
<script type="text/javascript">
    var BASE_URL = "<?php echo base_url(); ?>";
</script>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/Js/jquery.js"></script>
<script src="<?php echo base_url(); ?>/Js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>/Js/additional-methods.js"></script>
<script src="<?php echo base_url(); ?>/Js/select2.js"></script>
<script src="<?php echo base_url(); ?>/Js/Functions/mascotas.js"></script>
<script src="<?php echo base_url(); ?>/Js/functions/validaciones.js"></script>
<script src="<?php echo base_url(); ?>/Js/functions/consultas.js"></script>


<script src="<?php echo base_url(); ?>/Js/sweetalert2.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/Js/bootstrap.bundle.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/Js/adminlte.js"></script>
<!--datatable-->
<script src="<?php echo base_url(); ?>/Js/jquery.dataTables.js"></script>

<script src="<?php echo base_url(); ?>/Js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>/Js/dataTables.responsive.js"></script>

<script src="<?php echo base_url(); ?>/Js/dataTables.buttons.js"></script>
<script src="<?php echo base_url(); ?>/Js/buttons.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>/Js/Functions/default_datetable.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/Js/demo.js"></script>

<script src="<?php echo base_url(); ?>/Js/bootstrap5.js"></script>

<script>
    $('#modal_confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

</body>

</html>