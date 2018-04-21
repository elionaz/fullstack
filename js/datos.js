$("#cp_user").keyup(function() { //funcion para obtener direccion completa desde api externa
    var cp = $("#cp_user").val();
    var datos = [];
    $("#colonia_user").find('option').remove();
    $.getJSON("https://api-codigos-postales.herokuapp.com/v2/codigo_postal/"+cp, function (data) {
        $("#municipio_user").val(data.municipio);
        $("#ciudad_user").val(data.estado);
        $.each(data.colonias , function (id,nombre) {
            $("#colonia_user").append('<option value="' + nombre + '">' + nombre + '</option>');
        });
    });
})


$("#sexo_user").change(function() { //funcion para generar el rfc y curp
    var curp, nombre, apellido, fec_nac, lug_nac, sex, nac;
    $("#sexo_user option:selected").each(function () {
        sex = $(this).val();
    });

    $("#lnac_user option:selected").each(function () {
        lug_nac = $(this).val();
    });

    nombre = $("#nombre_user").val();
    apellido = $("#ap_user").val()+ " " + $("#am_user").val();
    fec_nac = $("#nac_user").val();

    if (nombre != '' && apellido != '' && fec_nac != '' && lug_nac != '' && sex != '') {
        $("#curp_user").curp({ //funcion para generar el curp desde la libreria calcularCurp.js
            nombre: nombre,
            apellido: apellido,
            fechaNacimiento: fec_nac,
            lugarNacimiento: lug_nac,
            sexo: sex
        }, function () {
            
            
        });
    } else {
        alert('Llene los campos obligatorios o el CURP no puede calcularse.');
    }

$.ajax({ //funcion para generar rfc desde api externa
    url: 'https://jfhe88-rfc-generator-mexico.p.mashape.com/rest1/rfc/get?apellido_materno=' + $("#am_user").val()+'&apellido_paterno=' + $("#ap_user").val()+'&fecha='+fec_nac+'&nombre='+nombre+'&solo_homoclave=0',
        type: 'GET',
        dataType: 'json',
        success: function (request) { $("#rfc_user").val(request.response.data.rfc); },
        error: function () { alert('error al obtener rfc'); },
        beforeSend: setHeader
    });


function setHeader(xhr) {
    xhr.setRequestHeader('X-Mashape-Key', 'YIxAF0Aa2NmshBo6KM5vtUdfh3ygp1GHz2bjsnr66TbLGPbpc6');
    xhr.setRequestHeader('Accept', 'application/json');
}
    

})
