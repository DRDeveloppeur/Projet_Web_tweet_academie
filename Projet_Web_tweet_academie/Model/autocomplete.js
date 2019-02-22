var availableTags = []

$( function() {
  [$.ajax({
    url: "Model/ComplementModel.php",
    type:"POST"
  }).done(function(data){
    availableTags = data.split(",");
  })];
} );

function search(){
  $( "#tags" ).autocomplete({
    source: availableTags
  })
}
