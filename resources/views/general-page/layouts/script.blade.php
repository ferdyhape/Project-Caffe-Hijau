<!-- Bootstrap core JavaScript -->
<script src="{{ URL::asset('jquery/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js'); }}"></script>


<!-- Additional Scripts -->
<script src="{{ URL::asset('assets/js/custom.js'); }}"></script>
<script src="{{ URL::asset('assets/js/owl.carousel.min.js'); }}"></script>
<script src="{{ URL::asset('assets/js/slick.js'); }}"></script>
<script src="{{ URL::asset('assets/js/isotope.js'); }}"></script>
<script src="{{ URL::asset('assets/js/accordions.js'); }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
</script>