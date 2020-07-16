$(document).ready(function() {
    $(".delete_item,.button_delete").click(DeleteItem);

    var images_list = document.getElementById("images_list");
    new Sortable(images_list, {
        group: 'images',
        animation: 200,
        filter: ".add",
    });
    $("#add_file").click(function() {
        $("#input_file").click();
    });
    $("#add_photo").click(function() {
        $("#input_photo").click();
    });

    (function CheckFiles() {
        $("#input_file").on("change", function() {
            var files = this.files;
            var input = $("<input />", {
                id: "input_file",
                type: "file",
                name: "photo[]",
                multiple: "true",
                accept: "image/*,image/jpeg",
                hidden: "true",
            });
        
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
        
                if (!file.type.match(/image\/(jpeg|jpg|png)/)) {
                    alert("Фотография "+file.name+" должна быть в jpg или png формате");
                    continue;
                }
                CreatePreview(files[i], false);
            }
            
            $(this).parent().prepend(input);
            CheckFiles();
        });
    }());
    (function CheckFile() {
        $("#input_photo").on("change", function() {
            var file = this.files[0];

            if (!file.type.match(/image\/(jpeg|jpg|png)/)) {
                alert("Фотография "+file.name+" должна быть в jpg или png формате");
                return 0;
            }
            CreatePreview(file, true);
        });
    }());

    function CreatePreview(file, isPreviewOnly) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var delete_button = $("<span />", {
                class: "delete_item",
                click: DeleteItem,
                text: 'x',
            });
            var img_item = $("<div />", {
                class: "item",
                html: ["<img src='"+event.target.result+"'/>", delete_button],
            });
            img_item.data('id', file.name);
            
            if (isPreviewOnly)
                $("#images_list").html(img_item);
            else
                $("#images_list").append(img_item);
        };
        reader.readAsDataURL(file);
    };
    function DeleteItem() {
        var item = $(this).parent();
        $(item).remove();
    };



    $(".form-group #list_btn").click(function() {
        var input = $(this).parent().children(".list_s");
        if (input.val()) {
            var option = $('<option />', {
                value: input.val(),
                text: input.val(),
                selected: true,
            });
            $(this).closest('.form-group').children('.form-select').prepend(option);
            input.val("");
        }
        else {
            input.addClass("is-invalid");
        }
    });
    $(".is-invalid").click(function() {
        $(this).removeClass("is-invalid");
    });
    $('.list_s').keypress(function(event){
        if(event.which === 13)
        {
            $(this).parent().children("#list_btn").click();
            return false;
        }
    });



    $(".form").on("submit", function() {
        $("#images_list .item").each(function(i, elem) {
            var data_val = $(this).data('id');
            var input_val = $("#photo_names").val();
            $("#photo_names").val(input_val+"|"+data_val);
        });
        $("#photo_names").val($("#photo_names").val().slice(1));
    });
});