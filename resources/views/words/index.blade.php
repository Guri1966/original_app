{{-- @var \Illuminate\Pagination\LengthAwarePaginator $words --}}

@extends('layouts.app')
@section('title', '単語帳一覧ページ')
@section('header')
@include('layouts.header')
@endsection
@section('content')
<div class="container">
    <div class="wordsection">
        <h2 class="mt-0 font-semibold text-xl text-gray-800 leading-normal">
            📖 単語帳一覧
        </h2>
        <button class="btn btn2" style="width:91%;max-width:300px;">
            登録単語一覧:(ABC順)</button>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
                @endif

                @if($words->isEmpty())
                <p>まだ単語が登録されていません。</p>
                @else
                <table class="cardbox">
                    <thead>
                        <tr>
                            <th>英語</th>
                            <th>音節</th>
                            <th>読み方</th>
                            <th>意味</th>
                            <th>類語</th>
                            <th>言い換え</th>
                            <th>イラスト</th>
                            <th>カテゴリ</th>
                            <th>操作 | ☑ピン留め</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($words as $word)
                        <tr>
                            <td>{{ $word->english }}</td>
                            <td>{{ $word->onsetu }}</td>
                            <td>{{ $word->yomikata }}</td>
                            <td>{{ $word->imi }}</td>
                            <td>{{ $word->ruigo }}</td>
                            <td>{{ $word->iikae }}</td>
                            <td>
                                @if($word->image_path)
                                <img src="{{ asset('storage/' . $word->image_path) }}" alt="イラスト" width="50">
                                @else
                                <p>イラストは登録されていません。</p>
                                @endif
                            </td>
                            <td>{{ $word->category?->name??'未分類'}}</td>
                            <td>
                                <div class="btn_area">
                                    <div class="edit_area">
                                        <form action="{{ route('words.edit', $word->id) }}" method="GET">
                                            @csrf
                                            <input type="submit" value="編集">
                                        </form>
                                    </div>
                                    <div class="del_area">
                                        <form action="{{ route('words.destroy', $word->id) }}" method="POST"
                                            onsubmit="return confirm('本当に削除しますか？')" ;>
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="削除">
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <form action="{{ route('words.toggle-hold',$word->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="hold_flag" value="0">
                                            <!-- hiddenを仕込んで常に0 or 1を送る -->
                                            <input type="checkbox" name="hold_flag" value="1"
                                                onchange="this.form.submit()" {{$word->hold_flag ? 'checked': ''}}>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- ページネーションリンク -->
                <div class="pagination">
                    {{ $words->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
</div>
@endsection