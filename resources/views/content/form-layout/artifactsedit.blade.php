@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
      </div>
      <div class="card-body">
        <form action="{{ route('artifacts.store',$artifacts->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row mb-6">
            <label class="col-sm-4 col-form-label" for="basic-default-name">Artifact Name</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="basic-default-name" name="name" value="{{ $artifacts->name }}" />
            </div>
          </div><br />
          <div class="row mb-6">
            <label class="col-sm-4 col-form-label" for="basic-default-company">Donor/Owner</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="basic-default-company" name="donor" value="{{ $artifacts->donor }}" />
            </div>
          </div><br />

          <div class="row mb-6">
            <label class="col-sm-4 col-form-label" for="basic-default-name">Category</label>
            <div class="col-sm-12">
              <select id="selectTypeOpt" name="category_id" class="form-select color-dropdown">
                <option value="bg-primary" selected>Select</option>
                @foreach($category as $id => $category)                
                  <option value="{{ $id }}">{{ $category ?? '' }}</option>
                @endforeach  
              </select>
            </div>  
          </div><br />
      
          <div class="row mb-6">
            <label class="col-sm-4 col-form-label" for="basic-default-phone">Qr Code</label>
            <div class="col-sm-12">
              <input type="text" id="basic-default-phone" class="form-control phone-mask" name="qrcode" value="{{ $artifacts->qrcode }}" aria-label="" aria-describedby="basic-default-phone" />
            </div>
          </div><br />
          <div class="row mb-6">
            <label class="col-sm-4 col-form-label" for="basic-default-phone">Product S.No</label>
            <div class="col-sm-12">
              <input type="text" id="basic-default-phone" class="form-control phone-mask" name="artifacts_sno"value="{{ $artifacts->artifacts_sno }}" aria-label="" aria-describedby="basic-default-phone" />
            </div>
          </div><br />
          <div class="row mb-6">
            <label class="col-sm-4 col-form-label" for="basic-default-message">Description</label>
            <div class="col-sm-12">
              <textarea id="basic-default-message" class="form-control" name="description" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{ $artifacts->description }}</textarea>
            </div>
          </div><br />
          <div class="row justify-content-end">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Bootstrap crossfade carousel (dark)</small>
      </div>
    {{-- </div>
  </div> --}}
    <!-- Bootstrap crossfade carousel -->
    {{-- <div class="col-md"> --}}
      {{-- <h5 class="my-4">Bootstrap crossfade carousel (dark)</h5>   --}}
      <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('assets/img/elements/18.jpg')}}" alt="First slide" />
            <div class="carousel-caption d-none d-md-block">
              <h3>First slide</h3>
              <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('assets/img/elements/13.jpg')}}" alt="Second slide" />
            <div class="carousel-caption d-none d-md-block">
              <h3>Second slide</h3>
              <p>In numquam omittam sea.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('assets/img/elements/2.jpg')}}" alt="Third slide" />
            <div class="carousel-caption d-none d-md-block">
              <h3>Third slide</h3>
              <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
