<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#hot_deal').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getHotDeals/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(5).html('<center><a href="<?php echo base_url();?>HotDealsEdit/'+data['deal_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['deal_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "deal_second_head", "orderable": false },
            { "data": "pro_sub_cat_name", "orderable": true },
            { "data": "deal_disp_order", "orderable": false },
            {
            "data": "deal_image",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/hotdeals/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
   
            { "data": "deal_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(deal_id){
    var conf = confirm("Do you want to Delete Hot Deals Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>HotDealsDelete/",
            data:{deal_id:deal_id},
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