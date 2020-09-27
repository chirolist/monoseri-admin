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
                  <form class="form-horizontal" action="{{ url('/product') }}" method="get">
                    @csrf
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="name">商品名</label>
                      <div class="col-md-4">
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ \Request::input('name') ?? old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="code">商品コード</label>
                      <div class="col-md-4">
                        <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" name="code" value="{{ \Request::input('code') ?? old('code') }}">
                        @error('code')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="description">商品説明</label>
                      <div class="col-md-10">
                        <input class="form-control @error('description') is-invalid @enderror" id="description" type="text" name="description" value="{{ \Request::input('description') ?? old('description') }}">
                        @error('description')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="memo">メモ</label>
                      <div class="col-md-10">
                        <input class="form-control @error('memo') is-invalid @enderror" id="memo" type="text" name="memo" value="{{ \Request::input('memo') ?? old('memo') }}">
                        @error('memo')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label">価格</label>
                      <div class="col-md-3">
                        <input class="form-control @error('price_from') is-invalid @enderror" type="number" name="price_from" value="{{ \Request::input('price_from') ?? old('price_from') }}">
                        @error('price_from')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>~
                      <div class="col-md-3">
                        <input class="form-control @error('price_to') is-invalid @enderror" type="number" name="price_to" value="{{ \Request::input('price_to') ?? old('price_to') }}">
                        @error('price_to')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label">在庫</label>
                      <div class="col-md-3">
                        <input class="form-control @error('stock_from') is-invalid @enderror" type="number" name="stock_from" value="{{ \Request::input('stock_from') ?? old('stock_from') }}">
                        @error('stock_from')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>~
                      <div class="col-md-3">
                        <input class="form-control @error('stock_to') is-invalid @enderror" type="number" name="stock_to" value="{{ \Request::input('stock_to') ?? old('stock_to') }}">
                        @error('stock_to')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <button class="btn btn-primary float-md-right" type="submit">商品を探す</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row-->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">総件数：<strong>{{ $products->total() }}</strong></div>
                <div class="card-body">
                  <table class="table table-responsive-sm table-hover table-outline mb-3">
                    <thead class="thead-light">
                      <tr>
                        <th class="text-center">
                          <svg class="c-icon">
                            <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-camera"></use>
                          </svg>
                        </th>
                        <th class="text-center text-nowrap">商品コード</th>
                        <th>商品名</th>
                        <th class="text-right text-nowrap">価格</th>
                        <th class="text-right text-nowrap">在庫</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td class="text-center">
                          <div class="c-avatar"><img class="c-avatar-img" src="{{ count($product->images) > 0 ? $product->images->first()->url : 'https://www.labaleine.fr/sites/default/files/image-not-found.jpg' }}" alt="test"></div>
                        </td>
                        <td class="text-center">{{ $product->code }}</td>
                        <td class="text-nowrap">
                          <div>{{ \Str::limit($product->name, 50, $end = '...') }}</div>
                          <div class="small text-muted">{{ \Str::limit($product->description, 30, $end = '...') }}</div>
                        </td>
                        <td class="text-right">&yen;{{ number_format($product->price) }}</td>
                        <td class="text-right">{{ $product->stock }}</td>
                        <td class="text-nowrap">
                          <button class="btn btn-sm btn-square btn-block btn-dark" type="button" onclick="location.href='{{ url('/product', [$product->id, 'edit']) }}'">編集</button>
                        </td>
                        <td class="text-nowrap">
                          <button class="btn btn-sm btn-square btn-block btn-info" type="button" onclick="location.href='{{ url('/product', [$product->id]) }}'">情報</button>
                        </td>
                        <td class="text-nowrap">
                          <button class="btn btn-sm btn-square btn-block btn-danger" type="button" data-toggle="modal" data-target="#dangerModal" onclick="setDelProductID({{ $product->id }})">削除</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $products->appends(Request::query())->onEachSide(2)->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="row align-items-center mb-3">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0"><button class="btn btn-square btn-block btn-primary" type="button" onclick="location.href='{{ url('/product/import/create') }}'">CSV一括登録</button></div>
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0"><button class="btn btn-square btn-block btn-primary" type="button" onclick="location.href='{{ url('/product/create') }}'">新規作成</button></div>
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
        <button class="btn btn-danger" type="button" onclick="deleteProduct()">削除</button>
      </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>
<!-- /.modal-->

<script>
  function setDelProductID(product_id) {
      document.formDelete.action = '/product/' + product_id;
  }
  function deleteProduct() {
      document.formDelete.submit();
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
<script src=" {{ mix('js/app.js') }} "></script>
@endsection
