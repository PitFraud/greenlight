<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#super_deal').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getSuperDeals/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>SuperDealsEdit/'+data['super_deal_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['super_deal_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "super_deal_name", "orderable": true },
            { "data": "pro_sub_cat_name", "orderable": true },
            { "data": "super_deal_enter_date", "orderable": false },
            { "data": "super_deal_status", "orderable": false },
            {
            "data": "super_deal_img",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/superdeals/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
   
            { "data": "super_deal_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(super_deal_id){
    var conf = confirm("Do you want to Delete Hot Deals Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>SuperDealsDelete/",
            data:{super_deal_id:super_deal_id},
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