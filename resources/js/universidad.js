/*$(document).ready(function(){
    function loadarea() {
        var depart_id = $('#departamentos').val();
        if ($.trim(depart_id) != '') {
            $.get('departamento', {depart_id: depart_id}, function (departamento) {

                var old = $('#universidad').data('old') != '' ? $('#universidad').data('old') : '';

                $('#universidad').empty();
                $('#universidad').append("<option value=''>Selecciona un universidad</option>");

                $.each(departamento, function (index, value) {
                    $('#universidad').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                })
            });
        }
    }
    loadarea();
    $('#departamentos').on('change', loadarea);
});*/