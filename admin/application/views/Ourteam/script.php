<script>
var response = $("#response").val();
if(response)
{
  console.log(response,'response');
  var options = $.parseJSON(response);
  noty(options);
}
$table = $('#ourteam').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getOurTeam/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(9).html('<center><a href="<?php echo base_url();?>ourteamEdit/'+data['our_team_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['our_team_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "empty", "defaultContent": ""},
            { "data": "our_team_name", "orderable": true },
            { "data": "our_team_desig", "orderable": false },
            { "data": "our_team_twitter_link", "orderable": false },
            { "data": "our_team_pintrest_link", "orderable": false },
            { "data": "our_team_instagram_link", "orderable": false },
            { "data": "our_team_vimeo_link", "orderable": false },
            { "data": "our_team_dip_order", "orderable": true },
            {
            "data": "our_team_img",
            "render": function (data, type, full, meta) {
                return "<img src=\"<?php echo base_url() ?>assets/uploads/ourteam/"+ data + "\" height=\"30\"  width=\"50\"/>";
            }},
            { "data": "our_team_id", "orderable": true },
        ]
        
    } );
 function confirmDelete(our_team_id){
    var conf = confirm("Do you want to Delete Our Team Details ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>ourteamDelete/",
            data:{our_team_id:our_team_id},
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