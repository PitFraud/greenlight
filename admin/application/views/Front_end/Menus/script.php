<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#menu').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getMenus/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>menusEdit/'+data['menu_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['menu_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            {"data": "empty" , "defaultContent": ""},
            { "data": "menu_name", "orderable": true },
            { "data": "menu_cat_name", "orderable": true },
            { "data": "menu_link", "orderable": false },
            { "data": "menu_display_order", "orderable": false },
            { "data": "menu_entered_date", "orderable": false },
           
            {
            "data": "menu_status",
            "render": function (data, type, full, meta) {
                return  (data == 1 ? 'Active' : 'InActive'); 
            }},
            { "data": "menu_id", "orderable": false }
        ]
        
    } );
 function confirmDelete(menu_id){
    var conf = confirm("Do you want to Delete Menu Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>menusDelete/",
            data:{menu_id:menu_id},
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