<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#offer').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getOffers/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>Administration/prodOffer/'+data['off_id']+'" title="Offer Products"><i class="	fa fa-plus-square-o iconFontSize-medium" ></i></a>&nbsp&nbsp&nbsp<a href="<?php echo base_url();?>offerEdit/'+data['off_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['off_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            
            { "data": "status", "orderable": true },
            { "data": "off_name", "orderable": false },
            { "data": "off_percentage", "orderable": false },
            { "data": "off_strt_date", "orderable": false },
            { "data": "off_end_date", "orderable": false },
   
            {
            "data": "off_img",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/offers/"+ data + "\" height=\"30\"  width=\"50\"/>";
            },
            "title": "Image",
            "orderable": true,
            "searchable": true
            },

            { "data": "off_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(off_id){
    var conf = confirm("Do you want to Delete Category Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>offerDelete/",
            data:{off_id:off_id},
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