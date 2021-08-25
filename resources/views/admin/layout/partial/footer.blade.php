
  <footer class="footer fixed-bottom footer-dark">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="d-block d-md-inline-block">Copyright &copy; 2021 <a class="text-bold-800 grey darken-2" href="#"
          target="_blank" style="color: #f19433;">Awamer Elshabaka && Cross Team</a>, All rights reserved. </span>
      </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('/dashboard/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('/dashboard/app-assets/vendors/js/ui/headroom.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('/dashboard/app-assets/vendors/js/ui/prism.min.js')}}"></script>
  <!-- END PAGE VENDOR JS-->
  
 
  <!-- data table -->
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <!-- data table -->
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/buttons.colVis.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/forms/validation/form-validation.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/extensions/jquery.toolbar.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/extensions/toolbar.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
  <script>
    $('.dataex-html5-selectors').DataTable({
        language: {
                "sProcessing":   "{{awtTrans("جاري التحميل...")}}",
                "sLengthMenu":   "{{awtTrans("أظهر مُدخلات")}} _MENU_",
                "sZeroRecords":  `<div><img  style="width:200px; height:200px" src="{{asset('storage/images/no_data.png')}}"></div>`,
                "sInfo":         "{{awtTrans('إظهار')}} _START_ {{awtTrans('إلى')}} _END_ {{awtTrans('من')}} {{awtTrans('أصل')}} _TOTAL_ {{awtTrans('مُدخل')}}",
                "sInfoEmpty":    "{{awtTrans('يعرض')}} 0 {{awtTrans('إلى')}} 0 {{awtTrans('من')}} {{awtTrans('أصل')}} 0 {{awtTrans('سجلّ')}}",
                "sInfoFiltered": "({{awtTrans('منتقاة من مجموع')}} _MAX_ {{awtTrans('مُدخل')}})",
                "sInfoPostFix":  "",
                "sSearch":       "{{awtTrans('ابحث')}}:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "{{awtTrans('الأول')}}",
                    "sPrevious": "{{awtTrans('السابق')}}",
                    "sNext":     "{{awtTrans('التالي')}}",
                    "sLast":     "{{awtTrans('الأخير')}}"
                }, 
                
        },
        dom: 'Bfrtip',
        buttons: [
            
            {
                extend :  'print',
                text   : '{{awtTrans('طباعة')}}'
            },
            {
                extend: 'copyHtml5',
                text: '{{awtTrans('نسخ')}} ',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                text: '{{awtTrans('جيسون')}} ',
                action: function ( e, dt, button, config ) {
                    var data = dt.buttons.exportData();

                    $.fn.dataTable.fileSave(
                        new Blob( [ JSON.stringify( data ) ] ),
                        'Export.json'
                    );
                }
            },
            {
                text: '{{awtTrans('اكسيل')}}',
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                text: '{{awtTrans('بي دي أف')}}',
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            
            
        ] 
    } );
  </script>
  @yield('script')
  <x-admin.alert />
</body>
</html>