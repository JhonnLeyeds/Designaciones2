$(function(){
    $(document).on('change','#universidad',function(e){
    	$('.delete_carrera option').remove();
        //alert($(this).find(":selected").val());
        e.preventDefault(e)
        $.ajax({
        	type:'POST',
        	url:'/carrer',
        	data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
        	success:function(data){
        		console.log(data)
        		var d = (data).length
        		console.log(d)
        		for(var i = 0; i < d; i++){
        			console.log(data[i].id)
        			$('#carrera').append('<option value=' + data[i].id + '>' + data[i].nombre + '</option>');

        		}
        	},
        	error:function(data){

        	}
        })
    });
});