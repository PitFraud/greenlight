<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#logo').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getLogo/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>editLogo/'+data['Logo_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['Logo_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "Logo_name", "orderable": true },
            {
            "data": "Logo_img",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/logo/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
            { "data": "Logo_id ", "orderable": true },
        ]
        
    } );
 function confirmDelete(Logo_id){
    var conf = confirm("Do you want to Delete Logo Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>LogoDelete/",
            data:{Logo_id:Logo_id},
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