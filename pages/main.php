<main>
    <p>main content</p>
        <!-- <div id='table'>
            <div class='table_row'>
                <div>id</div>
                <div>Num</div>
                <div>Name</div>
            </div>
        </div> -->

        <table id='table'>  
            <tr>
                <td>id</td>
                <td>Num</td>
                <td>Name</td>
            </tr>
        </table>
    <style>
        .red{
            background-color: white;
        }

        table, td, tr{
            border: solid 1px grey;
            border-spacing: 0px;
        }

        td{
            padding: .1em 1em;
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
                // $('#table').html(result);
                data = result;
                console.log(result);

                let table = document.getElementById('table');
                table.setAttribute("class", "red table");
                // table.setAttribute('class', 'table')

                let rows;         
                                
                let count = result.count;
                let numbers = result.number;
                let names = result.name;

                

                for(i = 0; i < count; i++){
                    // console.log(i);
                    // let row = document.createElement('div');
                    let row = document.createElement('tr');


                    row.setAttribute('class', 'table_row');
                    row.setAttribute('id', 'row'+i);
                    // let el =  '<div>'+i+'</div><div>'+numbers[i]+'</div><div>'+names[i]+'</div>';
                    // row.html = el;
                    row.innerHTML = '<td>'+i+'</td><td>'+numbers[i]+'</td><td>'+names[i]+'</td>';

                    
                    $("#table").append(row);
                    // console.log(row)


                }
            },
            error: function(result){
                console.log(result);
                console.log('error');
            }
        });
    </script>