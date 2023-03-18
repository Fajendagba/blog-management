<!-- jQuery -->
<script src="js/jquery-ui-1.12.0/external/jquery/jquery.js"></script>
<script src="js/jquery.min.js"></script>
<!--<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>-->

<!-- jQuery UI -->
<script src="js/jquery-ui-1.12.0/jquery-ui.js"></script>
<!--<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>-->

<!-- Tinymce minified -->
<script src="jss/tinymce/tinymce.min.js"></script>
<script src="jss/tinymce/jquery.tinymce.min.js"></script>

<!-- Dropzone -->
<script src="js/dropzone.js"></script>

<script>
    
    $(document).ready(function(){
        $('#console-debug').hide();
        
        $('#btn-debug').click(function(){
            $('#console-debug').toggle();
        });
        
        $('.btn-delete').on('click', function(){
            var selected = $(this).attr("id");
            var pageid   = selected.split("del_").join("");
            
            var confirmed = confirm("Are you sure you want to delete this page");
            
            if (confirmed === true) {
                $.get("ajax/pages.php?id="+pageid);
                $("#page_"+pageid).remove();
            }
            
        });
        
        $('#sort-nav').sortable({
            cursor: "move",
            update: function() {
            	var order = $(this).sortable("serialize");
            	$.get("ajax/list-sort.php", order);
            }
        });
        
        $('.nav-form').submit(function(event){
            
            var navData = $(this).serializeArray();
            var navLabel = $('input[name="label"]').val();
            var navId = $('input[name="id"]').val();
            
            $.ajax({
                
                url: 'ajax/navigation.php',
                method: 'POST',
                data: navData
                
            }).done(function(){
                $("#label_"+navId).html(navLabel);
                alert(navLabel);
            });
            event.preventDefault();
        });
        
    });
    
/*
$(document).ready(function(){
        if (jQuery) {
            alert("I am working!!!");
        } else {
            alert("I am not working!!!");
        }
    });

window.onload = function () {
    if (window.jQuery) {
        alert("I am working!!!");
    } else {
        alert("I am not working!!!");
    }
}
    
*/
    tinymce.init({
        selector: ".editor",
        theme: "modern",
        plugins: [
            "code advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emotions template paste textcolor"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | \n\
        alignleft aligncenter alignjustify | bullist numlist outdent indent | \n\
        link image | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: 'bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    });
    
</script>