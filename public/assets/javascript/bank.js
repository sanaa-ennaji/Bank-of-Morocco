

$(document).ready(function() {

    let table = $('#table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'../app/controllers/bank.php'
        },
        'columns': [
            { data: 'id' },
            { data: 'name' },
            { data: 'logo' },
            { data: 'id',
                render : function(data, type, row) {
                    return '<td class="border-x-2 border-b-2 border-black"><button class="delete" type="button" data-id=' + data + '><i class="fa-solid fa-trash-can"></i></button></td><td class="border-x-2 border-b-2 border-black"><button class="edit" type="button" data-id=' + data + '><i class="fa-solid fa-pen-nib"></i></button></td>'
                } 
            },
            
         ]
    });

    table.draw();
    $('#table').css("width", "100%");

    $(document).on('click', '.delete', function(){
        let id = $(this).data('id');
        // $row = $(this).parents("tr");
        $.ajax({
            url: '../app/controllers/bank.php',
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
        $("#overlay").addClass("opacity-50 z-10");
        $("#form").addClass("scale-100");
        $('#edit').addClass("hidden");
        // console.log(1);
    });

    $(document).on('click', '#overlay', function(){
        $('#id').val('');
        $('#name').val('');
        $('#logo').val('');
        $("#form").removeClass("scale-100");
        $("#overlay").removeClass("opacity-50 z-10");
        $('#edit').removeClass("hidden");
        $('#submit').removeClass("hidden");
        // console.log(1);
    });

    $(document).on('click', '#submit', function(){
        let name = $('#name').val();
        console.log(name);
        let logo = $('#logo').val();
        console.log(logo);
        $.ajax({
            url: '../app/controllers/bank.php',
            type: 'POST',
            data: {
                'name': name,
                'logo': logo,
                'submit': 1
            },
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
                $("#form").removeClass("scale-100");
                $("#overlay").removeClass("opacity-50 z-10");
            }
        });
    });

    $(document).on('click', '.edit', function(){
        let id = $(this).data('id');
        $.ajax({
            url: '../app/controllers/bank.php',
            type: 'GET',
            data: {
                'edit': 1,
                'id': id,
            },
            success: function(response){
                // remove the deleted comment
                let data = JSON.parse(response);
                $("#overlay").addClass("opacity-50 z-10");
                $("#form").addClass("scale-100");
                $('#submit').addClass("hidden");
                $('#id').val(data['id']);
                $('#name').val(data['name']);
                $('#logo').val(data['logo']);

            }
        });
    });

    $(document).on('click', '#edit', function(){
        let id = $('#id').val();
        let name = $('#name').val();
        let logo = $('#logo').val();
        $.ajax({
            url: '../app/controllers/bank.php',
            type: 'POST',
            data: {
                'edit': 1,
                'id': id,
                'name': name,
                'logo': logo
            },
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
                $("#form").removeClass("scale-100");
                $("#overlay").removeClass("opacity-50 z-10");
            }
        });
    });

});