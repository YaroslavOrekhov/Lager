<main>
    <p>main content</p>
        <div id='table'></div>
    <style>
        .red{
            background-color: red;
        }
    </style>
</main>
<script type='text/javascript'>
var data
        $.ajax({
            url:'api/api_back.php',
            type: 'GET',
            dataType: "json",
            // data: {
            //     method: 'get_data'
            // },
            success: function(result){
                // result = parseJSON(result);
                $('#table').html(result);
                document.getElementById('l').setAttribute("class", "red");
                // data = result;
            },
            error: function(result){
                console.log(result);
                console.log('error');
            }
        });
    </script>