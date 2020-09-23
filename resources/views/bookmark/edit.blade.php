@extends('layouts.app')

@section('content')
<div class="c-wrapper c-fixed-components">
  @include('layouts.top')
  <div class="c-body">
    <main class="c-main">
      <div class="container-fluid">
        <div class="fade-in">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header"><strong>Basic Form</strong> Elements</div>
                <div class="card-body">
                  <form class="form-horizontal" action="{{ url('/bookmark', [$bookmark->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">Title</label>
                      <div class="col-md-9">
                        <input class="form-control" id="text-input" type="text" name="title" value="{{ $bookmark->title ?? \Request::input('title') }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">URL</label>
                      <div class="col-md-9">
                        <input class="form-control" id="text-input" type="text" name="url" value="{{ $bookmark->url ?? \Request::input('url') }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">Status</label>
                      <div class="col-md-9 col-form-label">
                        <div class="form-check">
                          <input class="form-check-input" id="radio1" type="radio" value="1" {{ $bookmark->status === 1 || \Request::input('status') === 1 ? 'checked' : '' }} name="status">
                          <label class="form-check-label" for="radio1">Alive</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="radio2" type="radio" value="2" {{ $bookmark->status === 2 || \Request::input('status') === 2 ? 'checked' : '' }} name="status">
                          <label class="form-check-label" for="radio2">Dead</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="radio3" type="radio" value="3" {{ $bookmark->status === 3 || \Request::input('status') === 3 ? 'checked' : '' }} name="status">
                          <label class="form-check-label" for="radio3">Not Found</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="radio4" type="radio" value="0" {{ $bookmark->status === 0 || \Request::input('status') === 0 ? 'checked' : '' }} name="status">
                          <label class="form-check-label" for="radio4">Unknown</label>
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
