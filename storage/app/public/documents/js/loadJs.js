var AppUrl = 'http://127.0.0.1:8000/';
function addToCart(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/addToCart',
        method: "post",
        dataType: "json",
        data:{id :id},
        success:function(data){

            }
      });
}
