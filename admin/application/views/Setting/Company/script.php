<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#company_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getCompany/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>CompanyinfoEdit/'+data['cmp_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['cmp_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "cmp_status", "orderable": true },
            { "data": "cmp_name", "orderable": false },
            { "data": "cmp_adress", "orderable": false },
            { "data": "cmp_phone", "orderable": false },
            { "data": "cmp_email", "orderable": false },
            { "data": "cmp_gst", "orderable": false },
            { "data": "cmp_id", "orderable": false },
        ]
        
    } );
 function confirmDelete(cmp_id){
    var conf = confirm("Do you want to Delete Company Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deleteCompany/",
            data:{cmp_id:cmp_id},
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