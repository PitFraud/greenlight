<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#special_offer').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getSpecialOff/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>SpecialOffEdit/'+data['spoff_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['spoff_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "spoff_second_head", "orderable": false },
            { "data": "pro_sub_cat_name", "orderable": false },
            { "data": "spoff_disp_order", "orderable": false },
            {
            "data": "spoff_img",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/specialoffers/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
   
            { "data": "spoff_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(spoff_id){
    var conf = confirm("Do you want to Delete Special Offers Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>SpecialOffDelete/",
            data:{spoff_id:spoff_id},
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