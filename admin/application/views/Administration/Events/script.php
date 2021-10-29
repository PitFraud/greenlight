<script>

  $table = $('#event').DataTable( {
          "processing": true,
          "serverSide": true,
          "bDestroy" : true,
          "ajax": {
              "url": "<?php echo base_url();?>Administration/getEvent/",
              "type": "POST",
              "data" : function (data) {

             }
          },
          "createdRow": function ( row, data, index ){
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>Administration/editEvent/'+data['event_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['event_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            console.log(data['event_id']);
          },

          "columns": [
              { "data": "event_name", "orderable": true },
              { "data": "event_name", "orderable": true },
              { "data": "event_desc", "orderable": true },
              {"data": "event_image",
              "render": function (data, type, full, meta) {
                  return "<img src=\"<?php echo base_url() ?>assets/uploads/events/"+ data + "\" height=\"30\"  width=\"50\"/>";
              }},
              { "data": "event_desc", "orderable": false },
            ]
    });
    function confirmDelete(event_id){
      var conf = confirm("Do you want to delete Event ?");
      if(conf){
        $.ajax({
          url:"<?php echo base_url();?>Administration/deleteEvent/",
          data:{event_id:event_id},
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
