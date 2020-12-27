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
        @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
        @endif
        <div class="fade-in">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header"><strong>顧客登録</strong></div>
                <div class="card-body">
                  <form class="form-horizontal" action="{{ url('/user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>顧客コード</strong></label>
                      <div class="col-md-3">
                        <input class="form-control @error('code') is-invalid @enderror" id="text-input" type="text" name="code" value="{{ old('code') }}">
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>氏名</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('name') is-invalid @enderror" id="text-input" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>氏名（カナ）</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('kana') is-invalid @enderror" id="text-input" type="text" name="kana" value="{{ old('kana') }}">
                        @error('kana')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>郵便番号</strong></label>
                      <div class="col-md-3">
                        <input class="form-control @error('postcode') is-invalid @enderror" id="text-input" type="text" name="postcode" value="{{ old('postcode') }}">
                        @error('postcode')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>都道府県</strong></label>
                      <div class="col-md-3">
                        <input class="form-control @error('prefecture') is-invalid @enderror" id="text-input" type="text" name="prefecture" value="{{ old('prefecture') }}">
                        @error('prefecture')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>市区町村</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('city') is-invalid @enderror" id="text-input" type="text" name="city" value="{{ old('city') }}">
                        @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>住所1</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('address1') is-invalid @enderror" id="text-input" type="text" name="address1" value="{{ old('address1') }}">
                        @error('address1')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>住所2</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('address2') is-invalid @enderror" id="text-input" type="text" name="address2" value="{{ old('address2') }}">
                        @error('address2')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>電話番号</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('tel') is-invalid @enderror" id="text-input" type="text" name="tel" value="{{ old('tel') }}">
                        @error('tel')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>メールアドレス</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('email') is-invalid @enderror" id="text-input" type="text" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>生年月日</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('birthday') is-invalid @enderror" id="text-input" type="text" name="birthday" value="{{ old('birthday') }}">
                        @error('birthday')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>性別</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('sex') is-invalid @enderror" id="text-input" type="text" name="sex" value="{{ old('sex') }}">
                        @error('sex')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>パスワード</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('password') is-invalid @enderror" id="text-input" type="text" name="password" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <button class="btn btn-primary float-md-right" type="submit">登録する</button>
                    <a class="btn btn-secondary" href="{{ $page_list_url }}" role="button">一覧に戻る</a>
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
