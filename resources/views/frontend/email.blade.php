<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Ady</th>&nbsp;&nbsp;&nbsp;
      <th scope="col">Email</th>&nbsp;&nbsp;&nbsp;
      <th scope="col">Telefon belgi</th>&nbsp;&nbsp;&nbsp;
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ $name}}</td>&nbsp;&nbsp;&nbsp;
      <td>{{ $email }}</td>&nbsp;&nbsp;&nbsp;
      <td>{{ $phoneNumber }}</td>&nbsp;&nbsp;&nbsp;
    </tr>
  </tbody>
</table>

<h3>Teklip soralan harytlar</h3>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Haryt ady</th>&nbsp;&nbsp;&nbsp;
      <th scope="col">Haryt sany</th>&nbsp;&nbsp;&nbsp;
      <th scope="col">Haryt kody</th>&nbsp;&nbsp;&nbsp;
    </tr>
  </thead>
  <tbody>
    @foreach($cartsessionitems as $item)
    <tr>
      <td>{{$item['name']}}</td>&nbsp;&nbsp;&nbsp;
      <td>{{$item['quantity']}}</td>&nbsp;&nbsp;&nbsp;
      <td>{{$item['code']}}</td>&nbsp;&nbsp;&nbsp;
    </tr>
    @endforeach
  </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>