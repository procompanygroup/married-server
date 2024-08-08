 
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery --> 
<script src="{{ URL::asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 --> 
<script src="{{ URL::asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App --> 
<script src="{{ URL::asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/sweetalert.min.js') }}"></script>
<!-- AdminLTE for demo purposes --> 
{{-- <script src="{{ URL::asset('assets/admin/dist/js/demo.js') }}"></script> --}}
{{-- <script src="{{ URL::asset('assets/admin/js/custom/resumable.min.js') }}"></script> --}}
@yield('js')
</body>
</html>




