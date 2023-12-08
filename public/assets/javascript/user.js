

$(document).ready(function() {

    let table = $('#table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'../app/controllers/user.php'
        },
        'columns': [
            { data: 'id' },
            { data: 'username' },
            { data: 'nationality' },
            { data: 'gendre' },
            { data: 'role' },
            { data: 'id',
                render : function(data, type, row) {
                    return '<td class="border-x-2 border-b-2 border-black"><button class="delete" type="button" data-id=' + data + '><i class="fa-solid fa-trash-can"></i></button></td><td class="border-x-2 border-b-2 border-black"><button class="edit" type="button" data-id=' + data + '><i class="fa-solid fa-pen-nib"></i></button></td>'
                } 
            },
            
         ]
    });

    table.draw();
    $('#table').css("width", "100%");

    $("#role").on("click", function(){
        // console.log($(this).val());
        let $html = $(`<input type="checkbox" name="checkbox" value="${$(this).val()}" id="checkbox" class="checkbox" checked>`);

        $("#checkbox-wrapper").append($html);

        $html = $(`<label for="checkbox">${$(this).val()}</label>`);

        $("#checkbox-wrapper").append($html);

        $(this).find(`#${$(this).val()}`).remove();



        $(".checkbox").on("click", function(){

            $(this).next().remove();
            $(this).remove();
            if(!$("#role").find(`#${$(this).val()}`).length){
                let $html = $(`<option value="${$(this).val()}" id="${$(this).val()}">${$(this).val()}</option>`);
                $("#role").append($html);
            }


        });
    });

    $(document).on('click', '.delete', function(){
        let id = $(this).data('id');
        // $row = $(this).parents("tr");
        $.ajax({
            url: '../app/controllers/user.php',
            type: 'GET',
            data: {
                'delete': 1,
                'id': id,
            },
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
            }
        });
    });

    $(document).on('click', '#add', function(){
        $.ajax({
            url: '../app/controllers/user.php',
            type: 'GET',
            data: {
                'get': 1,
            },
            success: function(response){
                let data = JSON.parse(response);
                data = jQuery.makeArray(data);
                let html = "";
                data.forEach(e => {
                    html = "<option value=" + e.name + " id=" + e.name + ">" + e.name + "</option>";
                    $("#role").append(html);
                });
                console.log(data[1].name);
            }
        });
        $("#overlay").addClass("opacity-50 z-10");
        $("#form-wrapper").addClass("scale-100");
        $('#edit-form').addClass("hidden");
        // console.log(1);
    });

    $(document).on('click', '#overlay', function(){
        $("#form-wrapper").removeClass("scale-100");
        $("#overlay").removeClass("opacity-50 z-10");
        $('#edit-form').removeClass("hidden");
        $('#add-form').removeClass("hidden");
        $("#checkbox-wrapper").empty();
        $("#role").empty();
        // let $html = $(`<option value="admin" id="admin">admin</option><option value="client" id="client">client</option>`);
        // $("#role").append($html);
        // console.log(1);
    });

    $(document).on('submit', '#add-form', function(e){
        e.preventDefault();
        // let name = $('#name').val();
        // let logo = $('#logo').val();
        checkboxes = jQuery.makeArray($(".checkbox"));
        let checkboxData = [];
        checkboxes.forEach(e => {
            checkboxData.push(e.value);
        });
        let formData = new FormData(this);
        console.log(formData.get('username'));
        formData.append('add', 1);
        formData.append('checkboxes', checkboxData);
        $.ajax({
            url: '../app/controllers/user.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
                $("#form-wrapper").removeClass("scale-100");
                $("#overlay").removeClass("opacity-50 z-10");
                $('#edit-form').removeClass("hidden");
                $('#add-form').removeClass("hidden");
                $('#id').val('');
                $('#username').val('');
                $('#pw').val('');
                $('#nationality').val('');
                $('#city').val('');
                $('#district').val('');
                $('#street').val('');
                $('#postal-code').val('');
                $('#email').val('');
                $('#telephone').val('');
                $("#checkbox-wrapper").empty();
                $("#role").empty();
                // let $html = $(`<option value="admin" id="admin">admin</option><option value="client" id="client">client</option>`);
                // $("#role").append($html);
                let data = JSON.parse(response);
                console.log(data);
                
                // console.log(response);
            }
        });
    });

    $(document).on('click', '.edit', function(){
        let id = $(this).data('id');
        $.ajax({
            url: '../app/controllers/user.php',
            type: 'GET',
            data: {
                'edit': 1,
                'id': id,
            },
            success: function(response){
                // remove the deleted comment
                let data = JSON.parse(response);
                console.log(data);
                $("#overlay").addClass("opacity-50 z-10");
                $("#form-wrapper").addClass("scale-100");
                $('#add-form').addClass("hidden");
                $('#edit-form #id').val(data['id']);
                $('#edit-form #username').val(data['username']);
                $('#edit-form #nationality').val(data['nationality']);
                $('#edit-form #gendre').val(data['gendre']);
                $('#edit-form #city').val(data['city']);
                $('#edit-form #district').val(data['district']);
                $('#edit-form #street').val(data['street']);
                $('#edit-form #postal-code').val(data['postal_code']);
                $('#edit-form #email').val(data['email']);
                $('#edit-form #telephone').val(data['telephone']);
                $('#edit-form #agency').val(data['agency_id']);
                // role
                $('#edit-form #role').val(data['name']);

            }
        });
    });

    $(document).on('submit', '#edit-form', function(e){
        e.preventDefault();
        // let id = $('#id').val();
        // let name = $('#name').val();
        // let logo = $('#logo').val();
        let formData = new FormData(this);
        formData.append('edit', 1);
        $.ajax({
            url: '../app/controllers/user.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
                $("#form-wrapper").removeClass("scale-100");
                $("#overlay").removeClass("opacity-50 z-10");
                $('#edit-form').removeClass("hidden");
                $('#add-form').removeClass("hidden");
            }
        });
    });

});