<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#footer_detail').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getFooterDetailTable/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(5).html('<center><a href="<?php echo base_url();?>footerdetailEdit/'+data['footer_detail_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['footer_detail_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "footer_detail_about", "orderable": true },
            { "data": "footer_detail_email", "orderable": false },
            { "data": "footer_detail_contact_1", "orderable": true },
            { "data": "footer_detail_contact_2", "orderable": true },
            { "data": "footer_detail_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(footer_detail_id){
    var conf = confirm("Do you want to Delete Footer Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>footerdetailDelete/",
            data:{footer_detail_id:footer_detail_id},
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