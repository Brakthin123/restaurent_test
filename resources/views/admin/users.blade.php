<!DOCTYPE html>
<head>

    <title>User</title>
</head>
<body>
    
    <x-app-layout>
  
    </x-app-layout>
    
    <!DOCTYPE html>
    <html lang="en">
      <head>
        @include("admin.admincss")
      </head>
      <body>

        <div class="container-scroller">
        @include("admin.navbar")
            
        <div style="position: relative; top:60px; right: -150px " >

            <table bgcolor="grey" border="3px">
                <tr>
                    <th style="padding: 30px">Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                @foreach ($data as $data)
                    
                
                <tr align="center">
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>

                    @if ($data->usertype==("0"))
                    <td><a href="{{url('/deleteuser',$data->id)}}">Delate</a></td>
                    @else
                    <td><a >Not Allowed</a></td>
                    @endif
                </tr>
                
                @endforeach

            </table>

          </div>
        </div>
          <!-- page-body-wrapper ends -->
        </div>
        @include("admin.adminscript")
      </body>
    </html>

</body>
</html>