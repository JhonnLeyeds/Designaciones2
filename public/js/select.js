//id = especifica el state ,
//event.target = obtenemos el compoentente donde se genera el evento  , value= el id de nuestro facultdad
$(function(){
    $(document).on('change','#departamento',function(e){
    	$('.delete_uni option').remove();
        $('.delete_inst option').remove();
        $('.load_carrer_inti').prop('disabled', false);
        $('.load_carrer_uni').prop('disabled', false);
        //alert($(this).find(":selected").val());delete_inst
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'/cargar',
        	data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
        		console.log(data.insti)
                let array = data.univ
                let array1 = data.insti
                $('#universidad').append('<option>--Seleccione--</option>');
        		for(var i = 0; i < array.length; i++){
        			$('#universidad').append('<option value=' + array[i].id + '>' + array[i].nombre + '</option>');
        		}
                $('#instituto').append('<option>--Seleccione--</option>');
                for(var i = 0; i < array1.length; i++){
                    $('#instituto').append('<option value=' + array1[i].id + '>' + array1[i].nombre + '</option>');
                }
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('change','.load_carrer_uni',function(e){
        $('.delete_carrera option').remove();
        $('.load_carrer_inti').prop('disabled', true);
        $.ajax({
            type:'POST',
            url:'/cargar_carrera_uni',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                console.log(data.length)
                $('#carrera').append('<option>--Seleccione--</option>');
                for(var i = 0; i < data.length; i++){
                    $('#carrera').append('<option value=' + data[i].id + '>' + data[i].nombre + '</option>');
                }
            },
            error:function(data){
            }
        })
    })
    $(document).on('change','.load_carrer_inti',function(e){
        alert('load_insti')
        $('.load_carrer_uni').prop('disabled', true);
        $.ajax({
            type:'POST',
            url:'/cargar',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){

            },
            error:function(data){
            }
        })
    })
});