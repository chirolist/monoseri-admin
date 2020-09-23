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
                  <form class="form-horizontal" action="{{ url('/playhistory') }}" method="get">
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="date-input">Date</label>
                      <div class="col-md-9">
                        <input class="form-control" id="date-input" type="date" name="played_at" value="{{ Request::input('played_at') }}">
                        @if ($errors->has('title'))
                          <span class="help-block"><strong>{{ $errors->first('played_at') }}</strong></span>
                        @endif
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit"> Search</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row-->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header"> Total <strong>{{ $playhistories->total() }}</strong> playhistories</div>
                <div class="card-body">
                  <table class="table table-responsive-sm table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($playhistories as $playhistory)
                      <tr>
                        <td class="">{{ $playhistory->played_at->format('Y年m月d日') }}</td>
                        <td class="text-right">&yen;{{ number_format($playhistory->total) }}</td>
                        <td>
                          <button class="btn btn-sm btn-square btn-block btn-dark" type="button" onclick="location.href='{{ url('/playhistory', [$playhistory->id, 'edit']) }}'">edit</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                   {{ $playhistories->appends(Request::query())->onEachSide(2)->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="row align-items-center mb-3">
            <div class="col-12 col-xl mb-3 mb-xl-0"><button class="btn btn-square btn-block btn-secondary" type="button" onclick="location.href='{{ url('/playhistory/create') }}'">create</button></div>
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
