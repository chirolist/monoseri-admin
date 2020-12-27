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
                    <label class="col-md-3 col-form-label">顧客コード</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->code }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">氏名</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->name }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">氏名（カナ）</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->kana }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">郵便番号</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->postcode }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">都道府県</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->prefecture }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">市区町村</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->city }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">住所1</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->address1 }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">住所2</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->address2 }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">電話番号</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->tel }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">メールアドレス</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->email }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">生年月日</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->birthday }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">性別</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->sex }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">パスワード</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $user->password }}</p>
                    </div>
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
