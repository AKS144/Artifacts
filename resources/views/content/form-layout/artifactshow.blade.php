@extends('layouts/contentNavbarLayout')
@section('title', ' Horizontal Layouts - Forms')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script>
    $(document).ready(function(){
        $('#language').change(function(){
            var language = $('#language').val();
            //alert(language);
            var artId = $('#artId').val();
           // alert(artId);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: "{{ url('/selectlanguage') }}",
                //data: "language="+language+"& artId="+artId,
                data: {language: language, artId: artId},
                success: function (response){
                    //console.log(response);
                   $('#desc').html(response);
                }
            });

        });
    });
</script>

<div class="row">
    <!-- Blockquote -->
    <div class="col-lg">
      <div class="card mb-4 mb-lg-0">
        <h5 class="card-header">Artifacts</h5>
        <div class="card-body">
          <blockquote class="blockquote mt-3">
            <p class="mb-0">{{ $artifacts->name }}</p>
          </blockquote>
        </div>
        <hr class="m-0" />
        <div class="card-body">
          <small class="text-light fw-semibold">Donor/Owner</small>
          <figure class="mt-2">
            <blockquote class="blockquote">
              <p class="mb-0">{{ $artifacts->donor }}</p>
            </blockquote>
            {{-- <figcaption class="blockquote-footer">
              Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption> --}}
          </figure>
        </div>
        <hr class="m-0" />
        <div class="card-body">
            <small class="text-light fw-semibold">Category</small>
            <figure class="mt-2">
              <blockquote class="blockquote">
                <p class="mb-0">{{ $artifacts->categories->cat_name }}</p>
              </blockquote>
              {{-- <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
              </figcaption> --}}
            </figure>
          </div>
  
        <hr class="m-0" />
        <div class="card-body">
          <small class="text-light fw-semibold">Align Right</small>
          <figure class="text-end mt-2">
            <blockquote class="blockquote">
              <p class="mb-0">A well-known quote, contained in a blockquote element.</p>
            </blockquote>
            {{-- <figcaption class="blockquote-footer">
              Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption> --}}
          </figure>
        </div>
  
      </div>
    </div>
    <div class="col-lg">
      <div class="card">
        <h5 class="card-header">QR</h5>
        <div class="card-body"> 
        {!! QrCode::size(200)->generate('http://127.0.0.1:8000/form/artifacts/show/'.$artifacts->id ) !!}
        </div>
        <hr class="m-0" />
        @php
            $art_lan = App\Models\Language::where('artifacts_id',$artifacts->id)->get();
        @endphp
        <div class="card-body">   
            <div class="col-md-4">
              <label class="form-label" for="selectTypeOpt">Language</label>
              <select id="language" class="form-select color-dropdown">
                <option value="bg-primary" selected>Select</option>
                @foreach($art_lan as $art)
                    <option>{{ $art->language }}</option>   
                @endforeach            
              </select>
            </div>
          
        </div>
        {{-- <hr class="m-0" /> --}}
        {{-- <input type="text" value="{{ $art->artifact_id }}" id="artId"> --}}
        <input type="hidden" value="{{ $artifacts->id }}" id="artId">

        <div class="card-body">
            {{-- <textarea id="description">                
            </textarea>
             --}}
             {{-- <span id="desc">Description<?php echo $artifacts->description ?></span><br /> --}}
             {{-- <span id="desc">Description<?php echo $artifacts->description ?></span> --}}
             <span id="desc"></span>
           
        </div>
      </div>
    </div>
  </div>

@endsection

