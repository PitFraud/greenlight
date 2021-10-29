<script>

  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $table = $('#Finyear_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "searching":false,
        "ajax": {
            "url": "<?php echo base_url();?>Finyearget/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			if(data['fin_status']==1)
			{
				$('td', row).eq(1).html('<center>'+data['fin_year']+' <sapn style="color:green;">Active Financialyear</sapn></center>');
			}
			else
			{
				$('td', row).eq(1).html('<center>'+data['fin_year']+'</center>');
			}
            $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>FinyearEdit/'+data['finyear_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['finyear_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "status", "orderable": true },
            { "data": "fin_year", "orderable": false },
            { "data": "fin_startdate", "orderable": false },
            { "data": "fin_enddate", "orderable": false },
            { "data": "finyear_id", "orderable": false }
            
        ]
        
    } );
  var fin= $('#fin_status').val();
  if(fin==1)
  {
    $('.finckbox').prop('checked', true);
    
  }
  $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  $('#start_date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });
  $('#end_date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });

   function confirmDelete(finyear_id){
    var conf = confirm("Do you want to Delete Finyear Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>FinyearDelete",
            data:{finyear_id:finyear_id},
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