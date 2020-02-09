<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Sorting-Exercise</title>
</head>
<body>
  <div class="container mt-5">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          @php
              $direction = (request('direction') == 'asc') ? 'desc' : 'asc';
          @endphp
          <th scope="col">
            <a href="{{ route('users.index', ['sortBy' => 'name', 'direction' => $direction])}}">
              Name
              @include('includes._sort-icon', ['field' => 'name'])
            </a>
          </th>
          <th scope="col">
            <a href="{{ route('users.index', ['sortBy' => 'city', 'direction' => $direction])}}">
              City
              @include('includes._sort-icon', ['field' => 'city'])
            </a>
          </th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $key => $user)
            <tr>
              <th scope="row">{{ $users->firstItem() + $key }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->city }}</td>
            </tr>
          @endforeach
      </tbody>
    </table>
    {{ $users->appends(request()->input())->links() }}
  </div>
</body>
</html>