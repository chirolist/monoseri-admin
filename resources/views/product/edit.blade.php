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
                <div class="card-header"><strong>商品編集</strong></div>
                <div class="card-body">
                  <form class="form-horizontal" action="{{ url('/product', [$product->id]) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>商品コード</strong></label>
                      <div class="col-md-3">
                        <input class="form-control @error('code') is-invalid @enderror" id="text-input" type="text" name="code" value="{{ $product->code ?? old('code') }}">
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>商品名</strong></label>
                      <div class="col-md-10">
                        <input class="form-control @error('name') is-invalid @enderror" id="text-input" type="text" name="name" value="{{ $product->name ?? old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="textarea-input"><strong>商品説明</strong></label>
                      <div class="col-md-10">
                        <textarea class="form-control @error('description') is-invalid @enderror" id="textarea-input" name="description" rows="9" placeholder="">{{ $product->description ?? old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>価格</strong></label>
                      <div class="col-md-3">
                        <input class="form-control @error('price') is-invalid @enderror" id="text-input" type="text" name="price" value="{{ $product->price ?? old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input"><strong>在庫</strong></label>
                      <div class="col-md-3">
                        <input class="form-control @error('stock') is-invalid @enderror" id="text-input" type="text" name="stock" value="{{ $product->stock ?? old('stock') }}">
                        @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="textarea-input"><strong>メモ</strong></label>
                      <div class="col-md-10">
                        <textarea class="form-control @error('memo') is-invalid @enderror" id="textarea-input" name="memo" rows="9" placeholder="">{{ $product->memo ?? old('memo') }}</textarea>
                        @error('memo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="file-input"><strong>商品画像</strong></label>
                      <div class="col-md-3">
                        <input class="@error('image.*') is-invalid @enderror" id="file-input" type="file" name="image[]" multiple="multiple">
                        @error('image.*')
                        <div class="invalid-feedback">{{ $errors->first('image.*') }}</div>
                        @enderror
                        <div class="card mt-3">
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
                    <button class="btn btn-primary float-md-right" type="submit">更新する</button>
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
