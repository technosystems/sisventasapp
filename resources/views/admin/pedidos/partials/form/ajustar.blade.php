<div class="row">
	
<div class="col-sm-12">

        <div class="form-group ">
        <label class="form-label">Stock actual</label>
        {!! Form::number('stock_actual',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off']) !!}
        
       </div>
    </div>


   
     <div class="col-sm-4">
        <div class="form-group ">
        <label class="form-label">Precio de compra</label>
         {!! Form::text('precio_costo',null,['class'=>'form-control','disabled', 'placeholder'=>'$ Monto', 'required' => 'required','onkeypress'=>'return filterFloat(event,this);']) !!}
        
       </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group ">
        <label class="form-label">Precio de venta</label>
         {!! Form::text('precio_venta',null,['class'=>'form-control','disabled', 'placeholder'=>'$ Monto', 'required' => 'required','onkeypress'=>'return filterFloat(event,this);']) !!}
        
       </div>
    </div>
     <div class="col-sm-4">
        <div class="form-group ">
        <label class="form-label">Precio de mayoreo</label>
         {!! Form::text('precio_mayoreo',null,['class'=>'form-control','disabled', 'placeholder'=>'$ Monto', 'required' => 'required','onkeypress'=>'return filterFloat(event,this);']) !!}
        
       </div>
    </div>
    




</div>


@push('scripts')

<script>
    function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {
              return true;
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
}
</script>
@endpush