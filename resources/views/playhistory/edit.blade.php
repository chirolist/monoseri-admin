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
                  <form class="form-horizontal" action="{{ url('/playhistory', [$playhistory->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">Total</label>
                      <div class="col-md-9">
                        <input class="form-control" id="text-input" type="text" name="total" value="{{ $playhistory->total ?? \Request::input('total') }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="date-input">Played At</label>
                      <div class="col-md-9">
                        <input class="form-control" id="date-input" type="date" name="played_at" value="{{ $playhistory->played_at ?? \Request::input('played_at') }}">
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
