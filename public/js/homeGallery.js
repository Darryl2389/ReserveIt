<style type="text/css">
  /* #homeGallery{ position: relative; } */
  #homeGallery > img { position: absolute; left: 0; top: 0; display: none; }
  #homeGallery > img:first-child { display: block; }
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var
      images = "#homeGallery > img" // image selector
    , interval = 4000           // milliseconds between transitions
    , index = 0                 // starting index
    , count = $(images).length  // image count
      // the transition loop
    , handle = setInterval(function() {
        // fade out the current image
        $(images + ":eq(" + index + ")").fadeOut('slow');
        // get the next index, or cycle back to 0
        if (++index === count) index = 0;
        // fade in the next image
        $(images + ":eq(" + index + ")").fadeIn('slow');
      }
      , interval
    )
    , stop = function(){
        clearInterval(handle);
    };
  });
</script>
