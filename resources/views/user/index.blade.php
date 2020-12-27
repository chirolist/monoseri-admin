@extends('layouts.app')

@section('content')
<div class="c-wrapper c-fixed-components">
  @include('layouts.top')
  <div class="c-body">
    <main class="c-main">
      <div class="container-fluid">
        @if (Session::has('flash_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('flash_message') }}</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
        @endif
        <div class="fade-in">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header"><strong>検索フォーム</strong></div>
                <div class="card-body">
                  <form class="form-horizontal" action="{{ url('/user') }}" method="get">
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="code">顧客コード</label>
                      <div class="col-md-4">
                        <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" name="code" value="{{ \Request::input('code') ?? old('code') }}">
                        @error('code')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="name">氏名</label>
                      <div class="col-md-4">
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ \Request::input('name') ?? old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="prefecture">都道府県</label>
                      <div class="col-md-4">
                        <input class="form-control @error('prefecture') is-invalid @enderror" id="prefecture" type="text" name="prefecture" value="{{ \Request::input('prefecture') ?? old('prefecture') }}">
                        @error('prefecture')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="tel">電話番号</label>
                      <div class="col-md-4">
                        <input class="form-control @error('tel') is-invalid @enderror" id="tel" type="text" name="tel" value="{{ \Request::input('tel') ?? old('tel') }}">
                        @error('tel')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="email">メールアドレス</label>
                      <div class="col-md-4">
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" value="{{ \Request::input('email') ?? old('email') }}">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <button class="btn btn-info float-md-right" type="submit">検索</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row-->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">総件数：<strong>{{ $users->total() }}</strong><button class="btn btn-warning float-md-right" type="button" onclick="download_csv()">CSVダウンロード</button></div>
                <div class="card-body">
                  <table class="table table-responsive-sm table-hover table-outline mb-3">
                    <thead class="thead-light">
                      <tr>
                        <th class="text-center text-nowrap">顧客コード</th>
                        <th>氏名</th>
                        <th>氏名（カナ）</th>
                        <th class="text-center">都道府県</th>
                        <th class="text-center">電話番号</th>
                        <th class="text-center">メールアドレス</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td class="text-center">{{ $user->code }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->kana }}</td>
                        <td class="text-center">{{ $user->prefecture }}</td>
                        <td class="text-center">{{ $user->tel }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-nowrap">
                          <button class="btn btn-sm btn-square btn-block btn-dark" type="button" onclick="location.href='{{ url('/user', [$user->id, 'edit']) }}'">編集</button>
                        </td>
                        <td class="text-nowrap">
                          <button class="btn btn-sm btn-square btn-block btn-info" type="button" onclick="location.href='{{ url('/user', [$user->id]) }}'">情報</button>
                        </td>
                        <td class="text-nowrap">
                          <button class="btn btn-sm btn-square btn-block btn-danger" type="button" data-toggle="modal" data-target="#dangerModal" onclick="setDeluserID({{ $user->id }})">削除</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $users->appends(Request::Query())->onEachSide(2)->links() }}
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="row align-items-center mb-3">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0"><button class="btn btn-square btn-block btn-info" type="button" onclick="location.href='{{ url('/user/import/create') }}'">CSV一括登録</button></div>
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0"><button class="btn btn-square btn-block btn-info" type="button" onclick="location.href='{{ url('/user/create') }}'">新規作成</button></div>
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

<form name="formDelete" method="post" action="">
  @csrf
  <input type="hidden" name="_method" value="DELETE">
</form>

<div class="modal fade" id="dangerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">削除確認</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p>商品を削除します。本当によろしいですか？</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
        <button class="btn btn-danger" type="button" onclick="deleteuser()">削除</button>
      </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->

<script>
  function setDeluserID(user_id) {
      document.formDelete.action = '/user/' + user_id;
  }
  function deleteuser() {
      document.formDelete.submit();
  }
  function download_csv() {
      var param = location.search
      window.location.href = '/user_csv/download' + param;
  }
</script>

<!-- CoreUI and necessary plugins-->
<script src="/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<!--[if IE]><!-->
<script src="/coreui/vendors/@coreui/icons/js/svgxuse.min.js"></script>
<!--<![endif]-->
<!-- Plugins and scripts required by this view-->
<!-- <script src="/coreui/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>-->
<!-- <script src="/coreui/vendors/@coreui/utils/js/coreui-utils.js"></script>-->
<!-- <script src="/js/main.js"></script>-->
@endsection
