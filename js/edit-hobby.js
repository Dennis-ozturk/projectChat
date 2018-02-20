$(document).ready(function(){
  $(document).on("click", ".edit-hobby", function(){

    if ($('.hobby-form').hasClass("active")) {
      $('.hobby-form').removeClass('active');
      $('.hobby-form').addClass('close');

    }else if ($('.hobby-form').hasClass("close")) {
      $('.hobby-form').removeClass('close');
      $('.hobby-form').addClass('active');
    }
  })
});
