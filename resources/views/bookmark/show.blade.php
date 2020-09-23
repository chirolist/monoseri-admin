@extends('layouts.app')

@section('content')
<div class="c-wrapper c-fixed-components">
  @include('layouts.top')
  <div class="c-body">
    <main class="c-main">
      <div class="container-fluid">
        <div class="fade-in">
          <div class="row">
            <div class="col-sm-12 col-xl-12">
              <div class="card">
                <div class="card-header"> Jumbotron<small>fluid</small></div>
                <div class="card-body">
                  <iframe width="100%" height="480" src="{{ $bookmark->url }}" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header"><strong>Basic Form</strong> Elements</div>
                <div class="card-body">
                  <form class="form-horizontal" action="{{ url('/bookmark', [$bookmark->id, 'edit']) }}" method="" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">Title</label>
                      <div class="col-md-9">
                        <input class="form-control" id="text-input" type="text" name="title">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">URL</label>
                      <div class="col-md-9">
                        <input class="form-control" id="text-input" type="text" name="url" placeholder="http://hogehoge.com">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">Status</label>
                      <div class="col-md-9 col-form-label">
                        <div class="form-check">
                          <input class="form-check-input" id="radio1" type="radio" value="1" checked name="status">
                          <label class="form-check-label" for="radio1">Alive</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="radio2" type="radio" value="2" name="status">
                          <label class="form-check-label" for="radio2">Dead</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="radio3" type="radio" value="3" name="status">
                          <label class="form-check-label" for="radio3">Not Found</label>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                      <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row-->
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
