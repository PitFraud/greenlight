<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#pro_list').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getProductListCat/",
            "type": "POST",
            "data" : function (d) {

           }
        },
        "createdRow": function ( row, data, index ) {

            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(10).html('<center><a href="<?php echo base_url();?>ProductListCatEdit/'+data['pro_list_id']+'" title="Image List"><i class="fa fa-plus-square" ></i></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>ProductListCatEdit/'+data['pro_list_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['pro_list_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent":""},
            { "data": "pro_list_name", "orderable": false },
            { "data": "pro_sub_cat_name", "orderable": false },
            { "data": "first_name", "orderable": false },
            { "data": "pro_list_details", "orderable": false },
            { "data": "prod_list_price_original", "orderable": false },
            { "data": "pro_list_dicount_price", "orderable": false },
            { "data": "pro_list_stock", "orderable": false },
            { "data": "pro_list_enter_date", "orderable": false },
            // { "data": "pro_list_status", "render": function (data, type, full, meta) {
            //     return  (data == 1 ? 'Active' : 'InActive');
            // }},
            {
            "data": "pro_list_img",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/productlist/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
            { "data": "pro_list_id", "orderable": true },
        ]

    } );
 function confirmDelete(pro_list_id){
    var conf = confirm("Do you want to Delete Product List Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>ProductListCatDelete/",
            data:{pro_list_id:pro_list_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var options = $.parseJSON(data);
                noty(options);
                $table.ajax.reload();
            }
        });

    }
    }

</script>
