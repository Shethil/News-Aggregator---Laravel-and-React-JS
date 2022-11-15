<html>
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>

    <body>
        <div class="container">
        <table class="table table-border">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                    <th>Phone</th>
                    <th colspan='2'>More</th>
                </tr>
                @foreach($journalists as $journalist)
                <tr>
                    <td>{{$journalist->id}}</td>
                    <td>{{$journalist->name}}</td>
                    <td>{{$journalist->email}}</td>
                    <td>{{$journalist->gender}}</td>
                    <td>{{$journalist->dob}}</td>
                    <td>{{$journalist->phone}}</td>
                

                    <!-- <td><a herf="/journalistEdit">Edit</a></td> -->
                    <td><a href="/journalistEdit/{{$journalist->id}}">Edit</a></td>
                    <td><a href="/journalistDelete/{{$journalist->id}}">Delete</a></td>

                </tr>
                @endforeach
                
        </table>
    </body>
</html>