@extends('layouts.app')

@section('content')
<div class="c-wrapper c-fixed-components">
  @include('layouts.top')
  <div class="c-body">
    <main class="c-main">
      <div class="container-fluid">
        <div class="fade-in">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header"><strong>Basic Form</strong> Elements</div>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Code</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $product->code }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $product->name }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Description</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $product->description }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Price</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $product->price }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Stock</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $product->stock }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Memo</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $product->memo }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header"> Carousel<small>with controls</small></div>
                <div class="card-body">
                  <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
                    <div class="carousel-inner">
                      @foreach ($product->images as $image)
                      <div class="carousel-item @if($loop->first) active @endif"><img class="d-block w-100" src="{{ $image->url }}" data-holder-rendered="true"></div>
                      @endforeach
                    </div><a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="c-footer">
      <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
      <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
    </footer>
  </div>
</div>

<!-- CoreUI and necessary plugins-->
<script src="/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<!--[if IE]><!-->
<script src="/coreui/vendors/@coreui/icons/js/svgxuse.min.js"></script>
<!--<![endif]-->
<!-- Plugins and scripts required by this view-->
<!-- <script src="/coreui/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>-->
<!-- <script src="/coreui/vendors/@coreui/utils/js/coreui-utils.js"></script>-->
<!-- <script src="/js/main.js"></script>-->
<script src=" {{ mix('js/app.js') }} "></script>
@endsection
