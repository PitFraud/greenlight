<script>

    var response = $("#response").val();
    if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
    }
  

    $table = $('#receipt_list').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getReceipthead/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>editReceipthead/'+data['receip_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['receip_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "receipt_status", "orderable": true },
            { "data": "receipt_head", "orderable": false },
            { "data": "receipt_desc", "orderable": false },
            { "data": "receip_id", "orderable": false },
        ]
        
    } );
  

    function confirmDelete(receip_id){
    var conf = confirm("Do you want to Delete Receipthead Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deleteReceipthead/",
            data:{receip_id:receip_id},
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