<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#dod_list').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getLatestProduct/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>LatestProductEdit/'+data['latpro_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['latpro_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent":""},
            { "data": "pro_list_name", "orderable": false },
            { "data": "latpro_ent_date", "orderable": false },
            { "data": "latpro_status", "render": function (data, type, full, meta) {
                return  (data == 1 ? 'Active' : 'InActive'); 
            }},
            { "data": "latpro_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(latpro_id){
    var conf = confirm("Do you want to Delete Deal of the Day Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>LatestProductDelete/",
            data:{latpro_id:latpro_id},
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

$(document).ready(function(){
 
 // Initialize select2
 $("#pro_list_sear").select2();

 // Read selected option
//  $('#but_read').click(function(){
//    var username = $('#selUser option:selected').text();
//    var userid = $('#selUser').val();

//    $('#result').html("id : " + userid + ", name : " + username);

//  });
});

</script>