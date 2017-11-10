$(function(){
  $('.modal').on('click','button#register-submit',function(e){
    e.preventDefault();
    console.log('123');
  });
    $('form#frm-register-user').on('submit',function(e){
      e.preventDefault();
      var url = "/staff/register";
      var data = $(this).serialize();
      $.post($url,data,function(res){
        $(this).modal('close');
      });

      return false;
    });
});
