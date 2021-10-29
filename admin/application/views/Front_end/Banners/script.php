<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#banner').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getBanners/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(5).html('<center><a href="<?php echo base_url();?>bannerEdit/'+data['ban_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['ban_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "banner_name", "orderable": true },
            { "data": "ban_ent_date", "orderable": false },
            { "data": "ban_seq", "orderable": false },
            {
            "data": "ban_img",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/banners/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
   
            { "data": "ban_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(ban_id){
    var conf = confirm("Do you want to Delete Banner Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>bannerDelete/",
            data:{ban_id:ban_id},
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