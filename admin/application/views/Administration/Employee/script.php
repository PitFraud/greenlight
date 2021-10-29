<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#employee').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getEmployee/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(5).html('<center><a href="<?php echo base_url();?>Administration/employeeEdit/'+data['emp_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['emp_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [

            { "data": "status", "orderable": true },
            { "data": "name", "orderable": false },
            { "data": "designation", "orderable": true },
            { "data": "phone", "orderable": false },
            { "data": "address", "orderable": false },
            { "data": "emp_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(emp_id){
    var conf = confirm("Do you want to Delete Employee Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Administration/employeeDelete/",
            data:{emp_id:emp_id},
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