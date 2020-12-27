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
                      <p class="form-control-static">{{ $customer->code }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">氏名</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->name }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">氏名（カナ）</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->kana }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">郵便番号</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->postcode }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">都道府県</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->prefecture }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">市区町村</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->city }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">住所1</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->address1 }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">住所2</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->address2 }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">電話番号</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->tel }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">メールアドレス</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->email }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">生年月日</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->birthday }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">性別</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->sex }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">パスワード</label>
                    <div class="col-md-9">
                      <p class="form-control-static">{{ $customer->password }}</p>
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
