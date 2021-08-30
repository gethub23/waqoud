<div class="d-flex align-items-center justify-content-end copyright">
    <h6 class="mb-0"> <b>{{__('site.design_devolp')}}</b> </h6>
    <a href="https://aait.sa/" rel="follow" target="_blank"><b>{{__('site.awamer')}}</b></a>
</div>
</section>

<script src="{{asset('provider/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('provider/js/popper.min.js')}}"></script>
<script src="{{asset('provider/js/bootstrap.min.js')}}"></script>
<script src="{{asset('provider/js/wow.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('provider/js/main.js')}}"></script>
<script type="text/javascript">  new WOW().init(); </script>
@yield('js')
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            // "paging":   false,
            "ordering": false,
            "info":     false,
            'searching':   false,
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".previous .page-link").html(`<i class="fas fa-chevron-right"></i>`)
        $(".next .page-link").html(`<i class="fas fa-chevron-left"></i>`)
    });
    $(document).on("click", ".previous .page-link" , function () {
        $(".previous .page-link").html(`<i class="fas fa-chevron-right"></i>`)
        $(".next .page-link").html(`<i class="fas fa-chevron-left"></i>`)
    });
    $(document).ready(function (){
        $(".dataTables_wrapper .row:last-child div:last-child").addClass('col-12').removeClass("col-sm-12 col-md-7")

    })
</script>
</body>
</html>