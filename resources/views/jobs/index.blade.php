@extends('layouts.app')

@section('content')
<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
        <div class="content-box">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Pay</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->address}}</td>
                            <td>{{$job->category_id}}</td>
                            <td>$ {{$job->pay}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
