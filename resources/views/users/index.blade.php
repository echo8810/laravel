@extends('base')
@section('content')
  <div class="container">
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">検索条件</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="filter" method="get">
            <div class="modal-body">
              <!-- TODO:検索フォーム -->
            </div>
          </form>
          <div class="modal-footer">
            <a class="btn btn-outline-secondary" data-dismiss="modal">戻る</a>
            <button type="submit" class="btn btn-outline-secondary" form="filter">検索</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a class="btn btn-secondary filtered" style="visibility:hidden" href="/?page=1">検索を解除</a>
        <div class="float-right">
          <!-- TODO リンク先追加 -->
          <a class="btn btn-outline-secondary" href="">新規</a>
          <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" href="#">検索</a>
        </div>
      </div>
    </div>

    <div class="row" >
      <div class="col-12">
        <!-- TODO:ページネーション -->
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <ul class="list-group">
          @empty(count($users))
            <li class="list-group-item">
              対象のデータがありません
            </li>
          @endempty
          @foreach($users as $item)
            <li class="list-group-item">
              <div class="row">
                <div class="col-3">
                  <p>名前</p>
                </div>
                <div class="col-9">
                  <p>{{ $item->name }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p>登録日</p>
                </div>
                <div class="col-9">
                  <p>{{ $item->created_at }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="float-right">
                    <!-- TODO:リンク先追加 -->
                    <a class="btn btn-outline-secondary " href="">詳細</a>
                    <!-- TODO:リンク先追加 -->
                    <a class="btn btn-outline-secondary " href="">編集</a>
                    <!-- TODO:リンク先追加 -->
                    <a class="btn btn-outline-secondary " href="">削除</a>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="row" >
      <div class="col-12">
        <div class="float-right">
          <!-- TODO:リンク先追加 -->
          <a class="btn btn-outline-secondary" href="">新規</a>
          <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" href="#">検索</a>
        </div>
      </div>
    </div>
  </div>
@endsection