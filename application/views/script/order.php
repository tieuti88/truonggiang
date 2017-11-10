<script src="<?=HTTP_LTE_PATH?>plugins/viewbox/jquery.viewbox.min.js"></script>
<!-- DataTables -->
<script src="<?=HTTP_LTE_PATH?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=HTTP_LTE_PATH?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=HTTP_JS_PATH?>fnReloadAjax.js"></script>
<script type="text/javascript">
    $(function(){

        var table = $('#table_order').DataTable({
            "scrollY" : '500px',
            "scrollX" : true,
            "scrollCollapse": true,
            "fixedColumns":   {
                "rightColumns": 1
            },
            "proces sing": true,
            "serverSide": false,
            "ajax"      : {
                "url" : "order/datasource",
                "type"      : "POST"
            },
            "order": [[ 10, "<> <?=$this->session->userdata('roles')[0]?>" ],[0,'desc']],
            "columns": [
                { "data": "id" },
                { "data": "title", "render":function(data, type, row){
                    return '<a class="detail_order" data-info="'+row.id+'">'+data+'</a>';
                } },
                { "render": function(data, type, row){
                    return "<a href='/uploads/"+row.thumb+"' class='thumbnail'><img src='/uploads/"+row.thumb+"' width='100' height= '50' alt=''/></a>";
                } },
                { "data": "description" },
                { "data": "unit" },
                { "data": "qty" },
                { "data": "price" },
                { "data": "total_money" },
                { "data": "group_value", "render":function(data, type, row ){
                    var groups = $.parseJSON('<?=$groups?>');
                    return (typeof groups[data] === "undefined")?data:groups[data];
                } },
                { "data": "status",
                    "render": function ( data, type, row ){
                    var html = "";
                    if (data === null || data == 'unsigned') {
                        html = '<span class="label bg-red">Chưa tiếp nhận</span>';
                    }
                    if(data == 'market'){
                        html = '<span class="label bg-light-blue">Lên Market</span>';
                    }
                    if (data == 'processing') {
                        html = '<span class="label bg-green">Đang xuất in</span>';
                    }
                    if (data == 'packing') {
                        html = '<span class="label label-warning">Đóng gói & lưu kho</span>';
                    }
                    if (data == 'delivery') {
                        html = '<span class="label bg-green">Đang giao hàng</span>';
                    }
                    if (data == 'order_cancel') {
                        html = '<span class="label bg-gray">Đã huỷ</span>' + '<p>'+row.note+'</p>';
                    }

                    return html;
                } },
                { "data": "status",
                    "render": function ( data, type, row ) {

                    var button = '';
                    if (data === null || data == 'unsigned') {
                        button += '<?=@$button["unsigned"]?>';
                    }
                    if(row.group_value === null){
                        button += '<?=@$button["market"]?>';
                    }
                    if(data == 'market'){
                        button += '<?=@$button["processing"]?>';
                    }
                    if (data == 'processing') {
                        button += '<?=@$button["packing"]?>';   
                    }
                    if (data == 'packing') {
                        button += '<?=@$button["order_delivery"]?>';
                    }
                    if (data == 'delivery') {
                        button += '<?=@$button["done"]?>';
                    }
                    if (data == 'done') {
                        button += '<?=@$button["done"]?>';
                    }
                    if (data != 'order_cancel') {
                        button += '<?=@$button["cancel"]?>';
                    }


                    // button += '<a class="btn btn-xs btn-primary" href="#" title="View"><i class="fa fa-eye"></i></a>';
                        // button += '<a class="btn btn-xs btn-success" href="#" title="Edit"><i class="fa fa-edit"></i></a>';
                    return button;
                } }
            ],
            "columnDefs": [
                {
                    "targets": [ 2,4,5,6,7,8,10 ],
                    "searchable": false,
                    "orderable": false,
                }

            ]
        });
        var second = 50;

        $("button#reload").on('click',function(){
            table.ajax.reload(); 
            second = 50;
        });

        setInterval( function () {
            // table.ajax.reload();
            second -=1;
            $("#message-datatable").html("sau " + second + "s sẽ reload...");
            if(second == 0){
                table.ajax.reload();
                second = 50;
            }
        }, 1000 );
        
        $('#table_order').on('click','a.btn',function(e){
            e.preventDefault();
            var id = $(this).closest('tr[role=row]').find('td').first().text();
            var type = $(this).attr('data-type');

            if(type == 'order_cancel'){
                $.confirm({
                    title: 'Thông báo',
                    content: '' +
                    '<form action="" class="order_note">' +
                    '<div class="form-group">' +
                    '<label>Lý do </label>' +
                    '<textarea class="note form-control" placeholder="Lý do huỷ đơn hàng" required></textarea>' +
                    '</div>' +
                    '</form>',
                    type:'red',
                    buttons: {
                        formSubmit: {
                            text: 'OK',
                            btnClass: 'btn-red',
                            action : function () {
                                var note = this.$content.find('textarea.note').val();
                                $.post('/order/change_status', { 'id':id, 'type':type, 'note':note }, function(res){
                                    var result = $.parseJSON(res);
                                    if(result.status != 200) { 
                                        $.alert(result.message); 
                                        return false; 
                                    }
                                    $.alert(result.message);
                                    table.ajax.reload();
                                    second = 50;
                                });
                            },
                        },
                        Cancel: function () {
                            return true;
                        }
                    }
                });
            }else{
                $.confirm({
                    title: 'Thông báo',
                    content: 'Bạn có muốn thực hiện chuyển đơn hàng?',
                    type:'green',
                    buttons: {
                        yes: {
                            btnClass: 'btn-green',
                            action : function () {
                                $.post('/order/change_status', { 'id':id, 'type':type }, function(res){
                                    var result = $.parseJSON(res);
                                    if(result.status != 200) { 
                                        $.alert(result.message); 
                                        return false; 
                                    }
                                    $.alert(result.message);
                                    table.ajax.reload();
                                    second = 50;
                                });
                            },
                        },
                        No: function () {
                            return true;
                        }
                    }
                });
            }
            
        });

        //view detail user
        $('#table_order').on('click','a.detail_order',function(event){
            var id = $(this).attr('data-info');
            var url = "/order/info";


            $.post(url, { 'id':id }, function(res){
                var result = $.parseJSON(res);
                if(result.status != 200) { $.alert(result.message); return false; }
                var form = $('.modal#modal-detail');
                $.each(result.result['order'][0],function(key,val){
                    form.find('span[id='+key+']').html(val);
                    if(key == 'id')
                        form.find('input[name=user-id]').val(val);

                    if(key == 'thumb'){
                        var html = "<img src='/uploads/"+val+"' width='150' height='150' >";
                        if(val == '' || val == null){
                            html = "<img src='/assets/lte_admin/dist/img/user2-160x160.jpg' width='150' height='150' >"
                        }
                        form.find('span[id='+key+']').html(html);
                    }
                });
                var tbl = '';
                var stt = 1;
                $.each(result.result['order_group'],function(key,or_gr){
                    tbl += '<tr>'+
                    '<td width="5%">'+(stt++)+'</td>'+
                    '<td width="15%">'+or_gr.date_create+'</td>'+
                    '<td width="10%">'+label_status(or_gr.status)+'</td>'+
                    '<td width="15%">'+or_gr.group_name+'</td>'+
                    '<td width="5%">'+or_gr.user_follow+'</td>'+
                    '<td width="5%">'+or_gr.note+'</td>'+
                    '</tr>';

                });
                form.find('table#table_order_group tbody').html(tbl);
                form.modal('show');
            })
        });

        function label_status(data){
            console.log(data);
            var html = '';
            if (data == 'unsigned') {
                html = '<span class="label bg-red">Chưa tiếp nhận</span>';
            }
            if(data == 'market'){
                html = '<span class="label bg-light-blue">Lên Market</span>';
            }
            if (data == 'processing') {
                html = '<span class="label bg-green">Đang xuất in</span>';
            }
            if (data == 'packing') {
                html = '<span class="label label-warning">Đóng gói & lưu kho</span>';
            }
            if (data == 'delivery') {
                html = '<span class="label bg-green">Đang giao hàng</span>';
            }
            if (data == 'order_cancel') {
                html = '<span class="label bg-gray">Đã huỷ</span>';
            }
            if(data == null || data == '')
                html = data;
            return html;

        }
        $('#table_order').on('click','a.thumbnail',function(e){
            e.preventDefault();
            var vb = $(this).viewbox();
            vb.trigger('viewbox.open');
        });

    });
</script>