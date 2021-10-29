<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
var i = 1;
$table = $('#locations').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getLocation/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>locationEdit/'+data['loc_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['loc_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },
        "columns": [
            {title: 'id',data: null,render: (data, type, row, meta) => meta.row + 1},
            // {"data": null,"defaultContent": ""},
            { "data": "loc_city_name", "orderable": false },
            { "data": "loc_dist_name", "orderable": false },
            { "data": "loc_state_name", "orderable": false },
            { "data": "loc_post_code", "orderable": false },
            { "data": "loc_created_date", "orderable": false },
            { "data": "loc_id", "orderable": false },
            
        ]
        
    } );
 function confirmDelete(loc_id){
    var conf = confirm("Do you want to Delete Category Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>locationDelete/",
            data:{loc_id:loc_id},
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