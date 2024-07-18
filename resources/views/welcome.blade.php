<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ajax Laravel </title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>

</head>

<body>
    
<center>
    <br> <br>
    <div style="width:30%" id="showmessage"></div>
    
    <form action="{{url('ajaxupload')}}" method="POST" id="addpost" enctype="multipart/form-data">
        @csrf
        <br> <br> <br>
        <div>
            <label> Title : </label>
            <input type="text" name="title">
        </div>
        <br> <br> <br>
        <div>
            <label> Description : </label>
            <input type="text" name="description">
        </div>
        <br> <br> <br>
        <div>
            <label> Image : </label>
            <input type="file" name="image">
        </div>
        <br> <br> <br>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>
</center>

<script type="text/javascript">

    $(document).ready(function()
    {
        $('#addpost').on('submit',function(event)
        {
            event.preventDefault();
            
            jQuery.ajax({
                url:"{{url('ajaxupload')}}",
                type:'post',
                data:new FormData(this),
                contentType:false,
                processData:false,

                success:function(result)
                {
                    jQuery('#addpost')[0].reset();
                    alertMessage(result.message);
                }
            })

        });
    });

</script>

<script type="text/javascript">

    function alertMessage(message)
    {
        $('#showmessage').html(
            '<div class="alert alert-primary" role="alert">'
            +
            message
            +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>'
            +
            '</div>'
        )
    }

</script>


</body>
</html>