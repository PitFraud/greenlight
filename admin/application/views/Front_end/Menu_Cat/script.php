<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#menu_cat').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getMenuCategory/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>MenuCategoryEdit/'+data['menu_cat_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['menu_cat_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "menu_cat_name", "orderable": true },
            { "data": "menu_cat_order", "orderable": false },
            { "data": "menu_cat_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(menu_cat_id){
    var conf = confirm("Do you want to Delete Menu Category Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>MenuCategoryDelete/",
            data:{menu_cat_id:menu_cat_id},
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