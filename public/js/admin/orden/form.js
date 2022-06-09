var form    = false;


$(document).ready(function() {

  form = $('#main-form');

  
     
    $.fn.eventos();
    
  

  //$('#objetivos').hide();
    
});


$.fn.eventos = function(){


$('#cliente').unbind('change');//borro evento click
  $('#cliente').on("change", function(e) { //asigno el evento change u otro
   
    cliente_id = e.target.value;
    console.log(cliente_id);
    if(cliente_id != '0')
    {
      $.fn.get_telefono(cliente_id);
      
    }else{
      console.log('epa selecciona un dato valido');
    }

  });
  $('#tipoequipos').unbind('change');//borro evento click
  $('#tipoequipos').on("change", function(e) { //asigno el evento change u otro
   
    tipo_equipo_id = e.target.value;
    
     var marca = document.getElementById('hrefmarca');

      if ($('#tipoequipos').val() == 0) {

        marca.disabled = false;
        
      } 


    if(tipo_equipo_id != '0')
    {
      $.fn.get_marca(tipo_equipo_id);
      
    }else{
      console.log('epa selecciona un dato valido');
    }

  });
  


  $('#marcas').on("change", function(e) { //asigno el evento change u otro
   
    marca_id = e.target.value;
    var marca = document.getElementById('hrefmarca');
    console.log(marca);

    if(marca_id != '0')
    {

      $.fn.get_modelos(marca_id);


        
        
    
      
    }else{
      console.log('epa selecciona un dato valido');
    }

  });
  
}

/********* AJAX ***********/

$.fn.get_telefono = function(cliente_id){

      $.ajax({url: "/admin/clientes/"+cliente_id,
        method: 'GET',
        //data: {'cliente_id': cliente_id}
      }).then(function(result) {
        console.log(result);
          
        
        $(result).each(function( index, element ) {
          $('#telefono_cliente').val(element.telefono);
         
      
        });
      })
      .catch(function(err) {
          console.error(err);
      }); 

}

/********* AJAX ***********/

$.fn.get_marca = function(tipo_equipo_id){

  $.ajax({url: "/admin/tipoequipos/"+tipo_equipo_id,
        method: 'GET',
        //data: {'estados_id': estados_id}
      }).then(function(result) {
       
          
       
        

        $(result).each(function( index, element ) {
          
          //alert(element.name);

         $('#tipo_equipo').val(element.name);
         $('#idtipoequipo').val(element.id);
         input.disabled = false;
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });
      

      $.ajax({url: "/admin/equipos/"+tipo_equipo_id,
        method: 'GET',
        //data: {'estados_id': estados_id}
      }).then(function(result) {
       
          
        $('#marcas').html('<option value="0"> Seleccione </option>');
        

        $(result).each(function( index, element ) {
           
          $('#marcas').append('<option value="'+ element.id +'">'+ element.descripcion +'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

      $.ajax({url: "/admin/equipos/"+tipo_equipo_id,
        method: 'GET',
        //data: {'estados_id': estados_id}
      }).then(function(result) {
       
          
        $('#marcas').html('<option value="0"> Seleccione </option>');
        

        $(result).each(function( index, element ) {
           console.log(element)

          $('#marcas').append('<option value="'+ element.id +'">'+ element.name +'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

}

$.fn.get_modelos = function(marca_id){


     $.ajax({url: "/admin/marcas/"+marca_id,
        method: 'GET',
        //data: {'estados_id': estados_id}
      }).then(function(result) {
       
        $(result).each(function( index, element ) {
            

          console.log(element)
         $('#nombremarca').val(element.name);
         $('#idmarca').val(element.id);
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

      $.ajax({url: "/admin/marcas/"+marca_id+"/modelos",
        method: 'GET',
        //data: {'estados_id': estados_id}
      }).then(function(result) {
        console.log(result);
          
        $('#modelos').html('<option value="0"> Seleccione </option>');
        

        $(result).each(function( index, element ) {

          $('#modelos').append('<option value="'+ element.id +'">'+ element.descripcion+'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

}