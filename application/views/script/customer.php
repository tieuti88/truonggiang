<script src="<?=HTTP_LTE_PATH?>plugins/viewbox/jquery.viewbox.min.js"></script>
<!-- DataTables -->
<script src="<?=HTTP_LTE_PATH?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script src="<?=HTTP_LTE_PATH?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=HTTP_JS_PATH?>fnReloadAjax.js"></script>
<script type="text/javascript">
    $(function(){

        var table = $('#table_customer').DataTable({
            "scrollY" : '500px',
            "scrollX" : true,
            "scrollCollapse": true,
            "fixedColumns":   {
                "rightColumns": 1
            },
            "proces sing": true,
            "serverSide": false,
            "ajax"      : {
                "url" : "customer/datasource",
                "type"      : "POST"
            },
            "order": [[1,'desc']],
            "columns": [
                { "data": "id" },
                { "data": "name",
                "render" : function(data, e, row){
                    return "<a href='#' data-info='"+row.id+"' class='view_info' >"+data+"</a>";
                } },
                { "data": "email" },
                { "data": "address" },
                { "data": "phone_number" },
                { "data": "company_name" },
                { "data": "register_by" }
            ],
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        });
        
        $('#table_customer').on('click','a.view_info',function(e){
            e.preventDefault();
            var id = $(this).attr('data-info');
            $.post('/customer/info',{'id':id}, function(res){
                var result = $.parseJSON(res);
                if(result.status != 200) { $.alert(result.message); return false; }
                var form = $('.modal#modal-detail');
                $.each(result.result['customer'][0],function(key,val){
                    form.find('span[id='+key+']').html(val);
                    if(key == 'id')
                        form.find('input[name=customer-id]').val(val);

                    
                });
                var tbl = '';
                var stt = 1;
                $.each(result.result['order_customer'],function(key,or_cus){
                    var img = "<img src='/uploads/"+or_cus.thumb+"' width='150' height='150' >";
                    if(or_cus.thumb == '' || or_cus.thumb == null){
                        img = "<img src='/assets/lte_admin/dist/img/user2-160x160.jpg' width='150' height='150' >"
                    }
                    tbl += '<tr>'+
                    '<td width="5%">'+(stt++)+'</td>'+
                    '<td width="15%">'+or_cus.datecreate+'</td>'+
                    '<td width="10%">'+img+'</td>'+
                    '<td width="15%">'+or_cus.title+'</td>'+
                    '<td width="5%">'+or_cus.description+'</td>'+
                    '<td width="5%">'+or_cus.total_money+'</td>'+
                    '</tr>';

                });
                form.find('table#table_order_customer tbody').html(tbl);
                form.modal('show');
            });
        });
    });
</script>