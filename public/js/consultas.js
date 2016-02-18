
$('#nivel').change(function(event) {

        $('#materia').empty();
        
        

    
	 $.ajax({
        url: 'cargarMaterias/'+event.target.value,
         type: 'GET',
         dataType: 'json'
        

    })
    .done(function(data) {
         console.log("success");
        
         $.each(data, function(index, val) {
         	 $(".select-materia").append("<option value=\""+val.id+"\">"+val.descripcion+"</option>");
            
        });
          $(".select-materia").trigger("chosen:updated");
         $(".select-materia").chosen({ width: "60%" });
    })
     .fail(function() {
         console.log("error");
     })
     .always(function() {
        console.log("complete");
    });
    


    	
});