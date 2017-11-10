<script type="text/javascript">
    $(function(){
        //Submit register form by Uno
        //2017-08-07
        
        /*
        * Function validate form 
        * 
        */

        $('input#phone_mobile').on('keydown',function(e){
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl/cmd+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                 // Allow: Ctrl/cmd+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                 // Allow: Ctrl/cmd+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $(".modal").on("hidden.bs.modal", function(){
             var form  = $('form#frm-register-user');
             resetForm(form);
             switch_form(form,'add');
        });

        function resetForm(form){
            form.find('input').val('');
            form.find('input').removeAttr('disabled');
        }

        function checkform(form){
            var password = form.find('input#password').val();
            var confirm_password = form.find('input#confirm-password').val();
            var phone = form.find('input#phone_mobile').val();

            //clear error
            form.find('.has-error').removeClass('has-error');

            if( password == '' || confirm_password == '' ) return false;
            if( password !== confirm_password ){
                form.find('input#confirm-password').closest('.form-group').addClass('has-error');
                return false;
            }
            if(phone.length < 10 || phone.length > 13){
                form.find('input#phone_mobile').closest('.form-group').addClass('has-error');
                return false;
            }
            return true;
        }

        function buttonLoading(boolean=true){
            var html = '<i class="fa fa-cog fa-spin"></i>Saving...';
            if(boolean){
                html = '<i class="fa fa-user-plus fa-cog"></i> Add';
            }
            $('button[type=submit]#register-submit').html(html);
        }

        function reloadTable(){
            location.reload();
        }

        // switch form
        function switch_form(form,status='add'){
            if(status=='edit') {
                form.find('button#register-submit').css('display','none');
                form.find('button#register-edit-submit').css('display','inline-block');
            }else{
                form.find('button#register-submit').css('display','inline-block');
                form.find('button#register-edit-submit').css('display','none');
            }
        }

        //submit form : add & edit
        $('form#frm-register-user').on('submit',function(e){
            e.preventDefault();
            var form = $(this);

            //clear message
            form.find('i#notify_register').html('');

            if(!checkform(form)) return false;
            //disable button
            form.find('button[type=submit]').attr('disabled','disabled');

            //add spin loading
            buttonLoading(false);

            var url = "/staff/register";
            var data = form.serialize();
            $.post(url,data,function(res){
                console.log(res);
                var result = $.parseJSON(res);
                if(result.status == 200){
                    $('#modal-info').modal('toggle');
                    reloadTable();
                }
                if(result.status == 203){
                    //change spin loading
                    buttonLoading();
                    form.find('i#notify_register').html(result.message);
                    form.find('button[type=submit]').removeAttr('disabled');
                }
          
            });
            return false;
        });

        //edit user
        $('a.edit_register').on('click',function(event){
            var id = $(this).attr('data-info');
            var url = "/staff/info";
            var form  = $('form#frm-register-user');

            //switch form
            switch_form(form,'edit');

            $.post(url, { 'id':id }, function(res){
                var result = $.parseJSON(res);
                if(result.status != 200) { alert(result.message); return false; }

                form.find('input#password').attr('disabled','disabled');
                form.find('input#confirm-password').attr('disabled','disabled');

                $.each(result.result[0],function(key,val){
                    // if(key == 'password') continue;
                    form.find('input[name='+key+']').val(val);
                    if(key=='password')
                        form.find('input[name=confirm-password]').val(val);
                    if(key == 'role')
                        form.find('select[name=role]').val(val);
                });
                $('#modal-info').modal('show');
            })
        });

        //delete user
        $('a.delete_register').on('click',function(event){
            var id = $(this).attr('data-info');
            var url = "/staff/delete";

            $.confirm({
                title: 'Delete user',
                content: 'Do you want to delete this user?',
                type:'red',
                buttons: {
                    yes: {
                        btnClass: 'btn-red',
                        action : function () {
                            $.post(url, { 'id':id }, function(res){
                                var result = $.parseJSON(res);
                                if(result.status != 200) { alert(result.message); return false; }
                            })
                        },
                    },
                    No: function () {
                        return true;
                    }
                }
            });
            
        });

        //view detail user
        $('a.detail_register').on('click',function(event){
            var id = $(this).attr('data-info');
            var url = "/staff/info";


            $.post(url, { 'id':id }, function(res){
                var result = $.parseJSON(res);
                if(result.status != 200) { $.alert(result.message); return false; }
                var form = $('.modal#modal-detail');
                $.each(result.result[0],function(key,val){
                    form.find('span[id='+key+']').html(val);
                    if(key == 'id')
                        form.find('input[name=user-id]').val(val);

                    if(key == 'photo'){
                        var html = "<img src='"+val+"' width='150' height='150' >";
                        if(val == '' || val == null){
                            html = "<img src='/assets/lte_admin/dist/img/user2-160x160.jpg' width='150' height='150' >"
                        }
                        form.find('span[id='+key+']').html(html);
                    }
                });
                form.modal('show');
            })
        });

        //reset password
        $('button#reset_password').on('click',function(){
            var form = $('.modal#modal-detail');
            var uid = form.find('input[name=user-id]').val();
            var url = '/staff/reset_password';
            $.confirm({
                title: 'Reset password',
                content: 'Do you want to reset password this user?',
                type:'red',
                buttons: {
                    yes: {
                        btnClass: 'btn-red',
                        action : function () {
                            $.post(url, { 'id':uid }, function(res){
                                var result = $.parseJSON(res);
                                if(result.status != 200) { $.alert(result.message); return false; }
                                $.alert(result.message);
                            })
                        },
                    },
                    No: function () {
                        return true;
                    }
                }
            });
        });




    });
</script>