$(function(){
    alert('asdasdsad')
    $('.load_url').click(function(){
        load_url = $(this).attr('href')
        $("#global_content").html('')
        $("#global_content").load(load_url)
        return false;
    });
    $(document).on('submit','.save_date',function(e){
        console.log("asdasdas")
        var formData = new FormData($(this)[0]);
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
        })
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:formData,
            contentType: false,
            processData: false,
            success:function(data){
                $("#global_content").html(data)
            },
            error:function(data){
                function_error(data)

            }
        })
    })
    $(document).on('click','.click_charge_button',function(e){
        e.preventDefault(e)
        $.ajax({
        	type:'GET',
        	url:$(this).attr('href'),
        	data:{},
        	success:function(data){
                $("#global_content").html(data)
                return false;
        	},
        	error:function(data){
        	}
        })
    });
    $(document).on('change','#departamento',function(e){
    	$('.delete_uni option').remove();
        $('.delete_inst option').remove();
        $('.load_carrer_inti').prop('disabled', false);
        $('.load_carrer_uni').prop('disabled', false);
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
    function function_error(data){
        var asd = Object.keys(data.responseJSON.errors)
        console.log(asd)
        //console.log(data.responseJSON.errors[frutas[0]][0])
        for(i = 0; i<frutas.length; i++){
            if(asd.includes(frutas[i])) {
                //console.log(data.responseJSON.errors[frutas[0]][0])
                $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
            }else{
                $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
            }
        }
    }
});