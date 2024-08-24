</div>
</div>
<!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0 text-center">
                  Copyright ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- DataTable -->
    <script src="assets/datatable/jquery-3.7.1.js"></script>
    <script src="assets/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/datatable/dataTables.buttons.min.js"></script>
    <script src="assets/datatable/buttons.bootstrap5.min.js"></script>
<script src="assets/datatable/jszip.min.js"></script>
    <script src="assets/datatable/pdfmake.min.js"></script>
<script src="assets/datatable/vfs_fonts.js"></script>
<script src="assets/datatable/buttons.html5.min.js"></script>
<script src="assets/datatable/buttons.colVis.min.js"></script>
<script src="assets/datatable/buttons.print.min.js"></script>
  <!-- DataTable -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
  <script>
    $(document).ready(function () {
        $("#example").DataTable({
            // fixedHeader: true,
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: [
              'colvis',
                'pdfHtml5',
                
                'print'
            ]
        });
        table.buttons().container()
        .appendTo( '#example .col-sm-6:eq(0)' );
    });
</script>
<style>
  .dataTables_paginate .paginate_button.disabled {
    background-color: #ccc;
    color: #be3a3a;
    cursor: not-allowed;
}
  </style>
</html>