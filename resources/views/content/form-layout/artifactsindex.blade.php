@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Artifact Name</th>
          <th>Category</th>
          <th>Owner/Donor</th>
          <th>QR Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($artifacts as $artifacts)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $artifacts->name }}</strong></td>
          <td>{{ $artifacts->categories->cat_name }}</td>
          <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
              </li>
            </ul>
            {{-- <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle"> --}}         
           
          </td>
          {{-- <td><span class="badge bg-label-primary me-1">{{ $artifacts->qrcode }}</span></td> --}}
            {{-- <td>{!! QrCode::size(300)->generate('http://localhost/blog/generate-qr-code-laravel-8') !!}</td> --}}
          <td>{!! QrCode::size(100)->generate('http://127.0.0.1:8000/form/artifacts/show/'.$artifacts->id ) !!}</td>
          <td>   
              <button class="btn btn-danger">Delete</button>  
              <button type="button" href="{{ route('artifacts.edit',$artifacts->id ) }}"class="btn btn-icon btn-primary">                
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </button>                   
              <button class="btn btn-info">Edit</button>
              <button class="btn btn-secondary">Show</button>
          </td>

          {{-- <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td> --}}
        </tr>
        @endforeach        
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->



@endsection
