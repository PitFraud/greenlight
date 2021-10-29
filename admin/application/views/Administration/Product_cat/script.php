<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#prod_cat').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getProductCat/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>ProductCatEdit/'+data['pro_cat_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['pro_cat_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent":""},
            { "data": "prod_cat_name", "orderable": false },
            { "data": "prod_cat_display_order", "orderable": false },
            { "data": "prod_cat_status", "render": function (data, type, full, meta) {
                return  (data == 1 ? 'Active' : 'InActive'); 
            }},
            { "data": "pro_cat_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(pro_cat_id){
    var conf = confirm("Do you want to Delete Product Category Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>ProductCatDelete/",
            data:{pro_cat_id:pro_cat_id},
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