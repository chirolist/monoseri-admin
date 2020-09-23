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
                  <form class="form-horizontal" action="{{ url('/bookmark') }}" method="get">
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">Title</label>
                      <div class="col-md-9">
                        <input class="form-control" id="text-input" type="text" name="title" value="{{ \Request::input('title') }}">
                        @if ($errors->has('title'))
                          <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">URL</label>
                      <div class="col-md-9">
                        <input class="form-control" id="text-input" type="text" name="url" value="{{ \Request::input('url') }}">
                        @if ($errors->has('url'))
                          <span class="help-block"><strong>{{ $errors->first('url') }}</strong></span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label">Status</label>
                      <div class="col-md-9 col-form-label">
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="inline-checkbox0" type="checkbox" value="0" name="status[]">
                          <label class="form-check-label" for="inline-checkbox0">Unknown</label>
                        </div>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="inline-checkbox1" type="checkbox" value="1" name="status[]">
                          <label class="form-check-label" for="inline-checkbox1">Alive</label>
                        </div>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="inline-checkbox2" type="checkbox" value="2" name="status[]">
                          <label class="form-check-label" for="inline-checkbox2">Dead</label>
                        </div>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="inline-checkbox3" type="checkbox" value="3" name="status[]">
                          <label class="form-check-label" for="inline-checkbox3">Not Found</label>
                        </div>
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
                <div class="card-header"> Total <strong>{{ $bookmarks->total() }}</strong> Bookmarks</div>
                <div class="card-body">
                  <table class="table table-responsive-sm table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th>URL</th>
                        <th>Favo</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Info</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bookmarks as $bookmark)
                      <tr>
                        <td><a href="{{ $bookmark->url }}" target="_blank">{{ \Str::limit($bookmark->title, 90, $end = '...') }}</a></td>
                        <td class="text-right">{{ $bookmark->favo }}</td>
                        <td>
                          @if ($bookmark->status === 'Alive') 
                          <span class="badge badge-success">Alive</span>
                          @elseif ($bookmark->status === 'Dead') 
                          <span class="badge badge-danger">Dead</span>
                          @elseif ($bookmark->status === 'NotFound') 
                          <span class="badge badge-warning">NotFound</span>
                          @elseif ($bookmark->status === 'Unknown') 
                          <span class="badge badge-dark">Unknown</span>
                          @endif
                        </td>
                        <td>
                          <button class="btn btn-sm btn-square btn-block btn-dark" type="button" onclick="location.href='{{ url('/bookmark', [$bookmark->id, 'edit']) }}'">edit</button>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-square btn-block btn-info" type="button" onclick="location.href='{{ url('/bookmark', [$bookmark->id]) }}'">info</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                   {{ $bookmarks->appends(Request::query())->onEachSide(2)->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="row align-items-center mb-3">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0"><button class="btn btn-square btn-block btn-primary" type="button" onclick="location.href='{{ url('/bookmark/import/create') }}'">file import</button></div>
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0"><button class="btn btn-square btn-block btn-secondary" type="button" onclick="location.href='{{ url('/bookmark/create') }}'">create</button></div>
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
