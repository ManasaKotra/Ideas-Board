(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space


$( "#btn-add-model" ).click(function() {
  $('#add-modal').openModal();
});