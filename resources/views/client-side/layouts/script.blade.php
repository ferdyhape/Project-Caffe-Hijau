<!-- Bootstrap core JavaScript -->
<script src="{{ URL::asset('assets/dashboard/vendor/jquery/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js'); }}"></script>

<!-- Additional Scripts -->
<script src="{{ URL::asset('assets/js/custom.js'); }}"></script>
<script src="{{ URL::asset('assets/js/owl.carousel.min.js'); }}"></script>
<script src="{{ URL::asset('assets/js/slick.js'); }}"></script>
<script src="{{ URL::asset('assets/js/isotope.js'); }}"></script>
<script src="{{ URL::asset('assets/js/accordions.js'); }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
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
<script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?43961';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"",
      "borderRadius":"25",
      "marginLeft":"0",
      "marginBottom":"50",
      "marginRight":"50",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"Brownies Santri",
      "brandSubTitle":"Online",
      "brandImg":"{{ asset('assets/corp-assets/logo/Logo3.png') }}",
      "welcomeText":"Halo kak, pesen brownies langsung pesen chat ya :)",
      "messageText":"Hallo kak, mau pesen brownies dong!",
      "backgroundColor":"#0a5f54",
      "ctaText":"Pesen sekarang",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"6281230681794"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>