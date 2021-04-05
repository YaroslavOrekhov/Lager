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
            
            <th colspan="4">Отряды</th>
            
            <tr>
                <td>№</td>
                <td>Номер отряда</td>
                <td>Название отряда</td>
            </tr>
        </table>
    <style>
        .red{
            background-color: white;
        }

     table{
      
        width: 30%;
        padding: 10px 15px;
     }
     tr:nth-child(odd) {
    background-color:rgba(0, 255, 0, .2);
     }
     tr:nth-child(even) {
    background-color:rgba(255, 255, 0, .2);
     }
     tr:hover td {
    background: rgba(51, 51, 153, .1);
     }
     td{
        text-align: center;
        font-family: sans-serif;
        padding: 10px 15px;
     }
     th {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
     }
     tr:last-child td:last-child {
border-radius: 0 0 15px 0;
}
tr:last-child td:first-child {
border-radius: 0 0 0 15px;
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