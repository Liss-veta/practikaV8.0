$('#formdata').on('submit', function(event){
   event.preventDefault();
   let data_object = new FormData($('#formdata')[0])
    $.ajax({
        method: 'POST',
        url: '../avtor/bd_bookford/insert.php',
        data: data_object,
        contentType: false,
        processData: false,
        success: function (){
            alert(JSON.stringify(data_object));
        }
    })
});




/*$(document).ready(function() {
    e.preventDefault();


   $('button.otpravka').on('click', function() {
        let name_avtor = $('input.name_avtor').val();
        let strana = $('input.strana').val();
        let name_works = $('input.name_works').val();
        let year = $('input.year').val();
        let janr = $('input.janr').val();
        let comm_works = $('textarea.comm_works').val();
        let data_array = [];
        data_array[0] = ;
        data_array[1] = ;


        $.ajax ({
            method: "POST",
            url: "avtor/bd_bookford/insert.php",
            data: {
                name_avtor: name_avtor,
                strana: strana,
                name_works: name_works,
                year: year,
                janr: janr,
                comm_works: comm_works
            }
        })
            .done(function(){});
        $('input.name_avtor').val('');
        $('input.data_birthday').val('');
        $('input.strana').val('');
        $('input.img_avtors').val('');
        $('input.name_works').val('');
        $('input.data_works').val('');
        $('input.janr').val('');
        $('input.img_works').val('');
        $('textarea.comm_works').val('');
    })
})*/

/*$("#img_avtors").change(function() {
    let formData = new FormData();
    $.each($("#img_avtors")[0].files,function(key, input){
        formData.append('file[]', input);
    });
    $.ajax({
        type: "POST",
        url: '../avtor/bd_bookford/insert.php',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        dataType : 'json'
    });
});

$("#img_works").change(function() {
    let formData1 = new FormData();
    $.each($("#img_works")[0].files,function(key, input){
        formData1.append('file[]', input);
    });
    $.ajax({
        type: "POST",
        url: '../avtor/bd_bookford/insert.php',
        cache: false,
        contentType: false,
        processData: false,
        data: formData1,
        dataType : 'json'
    });
});*/
