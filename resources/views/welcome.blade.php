<html>

<head>
    <title>First use dynamodb using laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    <br />
    <div class="container box">
        <h3 align="center">First use dynamodb using laravel</h3><br />
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#catagoryy">
            Add catagory
        </button>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subcatagory">
            Add sub catagory
        </button>

       
        <div class="panel panel-default">
            <div class="panel-heading">Sample Data</div>
           
            <div class="panel-body">
                <div id="message"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="catagoryTable">
                        <thead>
                            <tr>
                                <th>Catagory</th>
                                <th>Sub catagory</th>
                                <th>Sub branch</th>
                            </tr>
                        </thead>
                        <tbody>
                           

                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
   

    <!-- add catagory -->
    <div class="modal fade" id="catagoryy" tabindex="-1" aria-labelledby="catagoryy" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
          
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="catagoryForm">
                @csrf
                <div class="form-group">
                    <label for="id_catagory">catagory num</label>
                    <input type="number" class="form-control" id="id_catagory" required>
                </div>
                <div class="form-group">
                    <label for="name_catagory">catagory name</label>
                    <input type="text" class="form-control" id="name_catagory" required>
                </div>
               
                
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </form>
            </div>
             
        </div>
        </div>
    </div>
    {{-- end --}}

    {{-- add sub catagory --}}
    <div class="modal fade" id="subcatagory" tabindex="-1" aria-labelledby="subcatagory" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
          
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="subcatagoryForm">
                @csrf

                <div class="form-group">
                    <label for="id_catagoryy">id</label>
                    <input type="text" class="form-control" id="id_catagoryy" required>
                </div>
                <div class="form-group">
                    <label for="name_catagoryy">catagory name</label>
                    <select class="form-select" aria-label="Default select example" id="name_catagoryy" required>
                        <option selected>Open this select menu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_catagoryy"> Sub catagory name</label>
                    <input type="text" class="form-control" id="sub_catagoryy" required>
                </div>

                <div class="form-group">
                    <label for="name_sub_branch"> Sub branch name</label>
                    <input type="text" class="form-control" id="name_sub_branch" required>
                </div>
                
                
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </form>
            </div>
             
        </div>
        </div>
    </div>
    {{-- end --}}

   

    
</body>

</html>

<script>
    $(document).ready(function() {

        fetch_catagory();

        fetch_data();

        // fetch all
        function fetch_data() {
            $.ajax({
                url: "/livetable",
                dataType: "json",
                success: function(data) {
                    var html = '';
                    html += '<tr>';
                   console.log(data);
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html +='<td contenteditable class="column_name" data-column_name="sub_catagory">' + data[count].name_catagory + '</td>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="sub_catagory">' + data[count].sub_catagory + '</td>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="name_sub_branch">' + data[count].name_sub_branch +'</td>';
                        
                    }
                    $('tbody').html(html);
                }
            });
        }
        // end

        // fetch catagory
        function fetch_catagory() {
            $.ajax({
                url: "/livetable",
                dataType: "json",
                success: function(data) {
                    var html = '';
                    // html += '<tr>';
                   console.log(data);
                    for (var count = 0; count < data.length; count++) {
                        // html += '<tr>';
                        html +='<option>' + data[count].name_catagory + '</option>';
                        // html +=
                        //     '<td contenteditable class="column_name" data-column_name="sub_catagory">' + data[count].sub_catagory + '</td>';
                        // html +=
                        //     '<td contenteditable class="column_name" data-column_name="name_sub_branch">' + data[count].name_sub_branch +
                        //     '</td>';
                        //  html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';
                    }
                    $('#name_catagoryy').html(html);
                }
            });
        }
        // end

        //  Add catagory
        $("#catagoryForm").submit(function(e){
            e.preventDefault();
            let id_catagory = $("#id_catagory").val();
            let name_catagory = $("#name_catagory").val();
            let _token = $("input[name=_token]").val();
            console.log(id_catagory);
            $.ajax({
                url: "{{route('add_catagory')}}",
                type:"put",
                data: {
                    id_catagory:id_catagory,
                    name_catagory:name_catagory,
                    _token:_token
                },
                success:function(response)
                {
                    if(response){
                        // $("#catagoryTable tbody").prepend('<tr><td>'+response.name_catagory+'</td><td>'+response.sub_catagory+' </td><td>'+response.name_sub_branch+'</td>');
                        $("#catagoryForm")[0].reset();
                        $('#message').html("<div class='alert alert-success'>Added successfully</div>");
                        // $("#catagoryy").modal('hide');
                        fetch_catagory();
                       
                    }
                }
            });
 
        });
        // end

        // Add sub catagory
        $("#subcatagoryForm").submit(function(e){
            e.preventDefault();
            let id_catagory = $("#id_catagoryy").val();
            let name_catagory = $("#name_catagoryy").val();
            let sub_catagory = $("#sub_catagoryy").val();
            let name_sub_branch = $("#name_sub_branch").val();
            let _token = $("input[name=_token]").val();
            console.log(id_catagory);
            $.ajax({
                url: "{{route('add_sub')}}",
                type:"put",
                data: {
                    id_catagory:id_catagory,
                    name_catagory:name_catagory,
                    sub_catagory:sub_catagory,
                    name_sub_branch:name_sub_branch,
                    _token:_token
                },
                success:function(response)
                {
                    if(response){
                        $("#catagoryTable tbody").prepend('<tr><td>'+response.name_catagory+'</td><td>'+response.sub_catagory+' </td><td>'+response.name_sub_branch+'</td>');
                        $("#subcatagoryForm")[0].reset();
                        $('#message').html("<div class='alert alert-success'>Added successfully</div>");
                        // $("#catagoryy").modal('hide');
                        // fetch_catagory();
                    }
                }
            });
 
        });
        // end
    });
</script>
