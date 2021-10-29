<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#product_scroll').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getProductScroll/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>productscrollEdit/'+data['proscro_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['proscro_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            {"data": "empty" , "defaultContent": ""},
            { "data": "pro_sub_cat_name", "orderable": false },
            { "data": "proscro_display_ord", "orderable": false },
            { "data": "proscro_enter_date", "orderable": false },
            { "data": "proscro_status", "render": function (data, type, full, meta) {
                return  (data == 1 ? 'Active' : 'InActive'); 
            }},
            { "data": "proscro_id", "orderable": false }
        ]
        
    } );
 function confirmDelete(proscro_id){
    var conf = confirm("Do you want to Delete Product Scroll Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>productscrollDelete/",
            data:{proscro_id:proscro_id},
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