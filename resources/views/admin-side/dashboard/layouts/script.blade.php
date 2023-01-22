<style>
    body {
        padding-right: 0 !important
    }
</style>

<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('assets/dashboard/vendor/jquery/jquery.min.js'); }}"></script>
{{-- <script src="{{ URL::asset('/assets/dashboard/vendor/jquery/jquery.slim.js'); }}"></script> --}}
<script src="{{ URL::asset('vendor/sweetalert/sweetalert.all.js'); }}"></script>
<script src="{{ URL::asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
<script src="{{ URL::asset('assets/bootstrap-5.0.2-dist/js/bootstrap.min.js'); }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js'); }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('assets/dashboard/js/sb-admin-2.min.js'); }}"></script>

<!-- Page level plugins -->
<script src="{{ URL::asset('assets/dashboard/vendor/chart.js/Chart.min.js'); }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL::asset('assets/dashboard/js/demo/chart-area-demo.js'); }}"></script>
<script src="{{ URL::asset('assets/dashboard/js/demo/chart-pie-demo.js'); }}"></script>
<script src="{{ URL::asset('assets/dashboard/vendor/datatables/jquery.dataTables.min.js'); }}"></script>
<script src="{{ URL::asset('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js'); }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL::asset('assets/dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL::asset('assets/dashboard/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/js/demo/chart-bar-demo.js') }}"></script>

<script>
    function previewImageCreate() {
        const image = document.querySelector('#picture');
        const imgPreview = document.querySelector('.img-preview-create')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    function editPicture(x) {
        var x = document.getElementById(`newpicture-${x}`);
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        }
    }
    function previewImageEdit(x) {
        const card = document.getElementById(`card-preview-${x}`);
        
        if (card.style.display === "none") {
        card.style.display = "block";
        } else {
        card.style.display = "none";
        }
        
        const image = document.getElementById(`newpicture-${x}`);
        const imgPreview = document.getElementById(`img-preview-edit-${x}`)
        
        imgPreview.style.display = 'block';
        
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        
        oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
    }
    
    $('body').on('click', '.view-image', function(){
        var image_path = $(this).data('image_path');
        var name = $(this).data('name').toUpperCase();

        Swal.fire({
            text: `Image of a ${name}`,
            imageUrl: `/storage/${image_path}`,
            imageWidth: '70%',
            imageAlt: 'Product-Image',
        })
    });

    $('body').on('click', '.delete-confirm', function () {
        let id = $(this).data('id');
        let name = $(this).data('name').toUpperCase();

        Swal.fire({
            title: 'Are you sure?',
            text: `You want to delete ${name}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`form-delete-${id}`).submit()
            }
        })
        
    });

    if (window.matchMedia('(max-width: 768px)').matches)
    {
        $("#logoImg").attr("src", "/assets/corp-assets/logo/Logo2.png").attr("width", "150%")
    }
    else {
        $("#logoImg").attr("src", "/assets/corp-assets/logo/logo4.png").attr("width", "75%")
    }

</script>