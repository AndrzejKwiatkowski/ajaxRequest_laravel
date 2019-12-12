<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Dodaj studenta
  </button>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email</th>
        <th scope="col">EDIT</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
          
      <td scope="row">{{$student->id}}</td>
          <td>{{$student->name}}</td>
          <td>{{$student->surname}}</td>
          <td>{{$student->email}}</td>
          <td><button type="submit" href="" class="edit btn alert-danger" id="edit">Edit</button> 
              <button type="submit" href="" class="delete btn alert-primary" id="delete">Delete</button>
          </td>
        
      </tr>
      @endforeach

     </tbody>
  </table>
  
  
  <!-- Modal Add -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="addfrom">
        <div class="modal-body">
            
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Surname</label>
                    <input type="text" name="surname" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>
      </form>

        
      </div>
    </div>
  </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="editForm">
          <div class="modal-body">
              
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <input type="hidden" name="id" id="id">
                  <div class="form-group">
                      <label for="exampleInputPassword1">Name</label>
                      <input type="text" name="name" id="name" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Surname</label>
                      <input type="text" name="surname" id="surname" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </div>
        </form>
  
          
        </div>
      </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>

  // edit
$(document).ready(function() {
    $('.edit').on('click', function() {
        $('#exampleModalEdit').modal('show');

     $tr = $(this).closest('tr');
     var data = $tr.children("td").map( function () {
       return $(this).text();
       }).get();
       console.log(data)

       $('#id').val(data[0]);
       $('#name').val(data[1]);
       $('#surname').val(data[2]);
       $('#email').val(data[3]);
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();

        var id = $('#id').val();

        $.ajax({
            type: "PUT",
            url: "/studentupdate/"+id,
            data: $('#editForm').serialize(),
            success: function (response) {
                console.log(response)
               $('#exampleModalEdit').modal('hide')
                alert("data saved");
                location.reload();

            },

            error: function(error) {
                    console.log(error)
                    alert("Data not saved");
                }
        });
    });


});

  // add
  $(document).ready(function() {
    $('#addfrom').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/studentadd",
            data: $('#addfrom').serialize(),
            success: function (response) {
                console.log(response)
                location.reload();
               $('#exampleModal').modal('hide')
                alert("data saved");
            },

            error: function(error) {
                    console.log(error)
                    alert("Data not saved");
                }
        });
    });
});
</script>

</body>
</html>
