$(document).foundation();
(function(){
  var quotes = document.querySelectorAll('#quotes .quote');


function toggleState(event){
  var it = event.currentTarget;
  it.classList.toggle('closed');
  TweenLite.fromTo(it.querySelector('.buttons .leftButton'),1,{opacity:0},{opacity:1});
  TweenLite.fromTo(it.querySelector('.buttons .centerButton'),1,{opacity:0},{opacity:1});
  TweenLite.fromTo(it.querySelector('.buttons .rightButton'),1,{opacity:0},{opacity:1});

}

  for(var i=0;i<quotes.length;i++){
    quotes[i].addEventListener('click', toggleState, false);
  }

 $('.productEntry').on('click', function() {
     $('#delete_product_modal .block_name').text($(this).data('block-name'));
     $('#delete_product_modal .delete_button').attr('href', '/admin/product/' + $(this).data('block-id'));
     $('#overlay').addClass('active');
     $('#delete_product_modal').addClass('open');
 })

 $('#overlay, #delete_product_modal .greyButton').on('click', function() {
     $('#overlay').removeClass('active');
     $('#delete_product_modal').removeClass('open');
 })

 if (window.location.search.indexOf('delete_success') > -1) {
     toastr.success('Product successfully deleted');
 }

 if (window.location.search.indexOf('delete_error') > -1) {
     toastr.error('There was a problem deleting the product.');
 }
 
 if (window.location.search.indexOf('created') > -1) {
     toastr.success('Successfully created new product.');
 }
})();
