<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#submenu').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getSubmenus/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(5).html('<center><a href="<?php echo base_url();?>submenusEdit/'+data['sub_menu_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['sub_menu_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            {"data": "empty" , "defaultContent": ""},
            { "data": "sub_menu_name", "orderable": true },
            { "data": "menu_name", "orderable": false },
            { "data": "sub_menu_link", "orderable": false },
            { "data": "sub_menu_status", "render": function (data, type, full, meta) {
                return  (data == 1 ? 'Active' : 'InActive'); 
            }},
            { "data": "sub_menu_id", "orderable": false }
        ]
        
    } );
 function confirmDelete(sub_menu_id){
    var conf = confirm("Do you want to Delete Submenu Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>submenusDelete/",
            data:{sub_menu_id:sub_menu_id},
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