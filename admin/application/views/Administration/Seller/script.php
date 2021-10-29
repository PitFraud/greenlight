<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#seller').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getSeller/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>sellerEdit/'+data['sell_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['off_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "sell_name", "orderable": false },
            { "data": "sell_comp_name", "orderable": false },
            { "data": "sell_address", "orderable": false },
            { "data": "sell_phone_no", "orderable": false },
            {"data": "sell_img","render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/seller/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
            { "data": "sell_status", "orderable": true },
            { "data": "sell_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(off_id){
    var conf = confirm("Do you want to Delete Category Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>offerDelete/",
            data:{off_id:off_id},
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