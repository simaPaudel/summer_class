@extends('admin.master')

@section('content')
    <div class="main">
      <h2>Dashboard Overview</h2><br>
      <div class="cards">
        <div class="card">
          <h3>Total Users</h3>
          <p>{{ $statistics['totalUsers'] }}</p>
        </div>
        <div class="card">
          <h3>Total Movies</h3>
          <p>{{ $statistics['totalMovies'] }}</p>
        </div>
        <div class="card">
          <h3>Total Genres</h3>
          <p>{{ $statistics['totalGenres'] }}</p>
        </div>
        <div class="card">
          <h3>Total Movies Watched</h3>
          <p>{{ $statistics['totalMoviesWatched'] }}</p>
        </div>
      </div>

      <div class="recent-watched">
        <h2>Recently Watched Movies</h2>
        <ul>
          @foreach($movies as $movie)
          <li><strong>{{ $movie->name }}</strong></li>
          @endforeach
        </ul>
      </div>
    </div>
@endsection
