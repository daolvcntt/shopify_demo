@extends('layouts.app')
@section('content')

    <div class="pagetitle">
        <div class="row">
            <div class="col-8">
                <h1>Customers</h1>
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                      <li class="breadcrumb-item">Customers</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4">
              @can('write-customers')
                <a href="{{route('customers.sync')}}" style="float: right" class="btn btn-primary">Sync Customers</a>
              @endcan
            </div>
        </div>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Your Customers</h5>
              {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Created On</th>
                  </tr>
                </thead>
                <tbody>
                  @isset($customers)
                    @foreach($customers as $key => $customer)
                      <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$customer['first_name'].' '.$customer['last_name']}}</td>
                        <td>{{$customer['email']}}</td>
                        <td>{{$customer['phone']}}</td>
                        <td>{{date('Y-m-d', strtotime($customer['created_at']))}}</td>
                      </tr>
                    @endforeach
                  @endisset
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>
@endsection