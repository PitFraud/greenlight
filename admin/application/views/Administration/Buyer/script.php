<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#buyer').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getBuyer/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>designationEdit/'+data['id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "buy_name", "orderable": true },
            { "data" : "buy_address", "orderable": true},
            { "data": "buy_phone", "orderable": false },
            {"data": "buy_image", "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/buyer/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
            { "data": "buy_status", "orderable": false },
            { "data": "buy_id", "orderable": false },
        ]
        
    } );
 function confirmDelete(id){
    var conf = confirm("Do you want to Delete Designation Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>designationDelete/",
            data:{id:id},
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