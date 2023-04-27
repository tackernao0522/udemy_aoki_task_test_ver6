@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新規登録</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            氏名
                            <input type="text" name="your_name" value="{{ old('your_name') }}" autofocus>
                            <br>
                            件名
                            <input type="text" name="title" value="{{ old('title') }}">
                            <br>
                            メールアドレス
                            <input type="text" name="email" value="{{ old('email') }}">
                            <br>
                            ホームページ
                            <input id="url" type="url" name="url" value="{{ old('url') }}">
                            <br>

                            性別
                            <input type="radio" name="gender" value="0" {{ old('gender') == 0 ? 'checked' : '' }}>男性
                            <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>女性
                            <br>
                            年齢
                            <select name="age">
                                <option value="">選択してください</option>
                                <option value="1" {{ old('age') == 1 ? 'selected' : '' }}>〜19歳</option>
                                <option value="2" {{ old('age') == 2 ? 'selected' : '' }}>20歳〜29歳</option>
                                <option value="3" {{ old('age') == 3 ? 'selected' : '' }}>30歳〜39歳</option>
                                <option value="4" {{ old('age') == 4 ? 'selected' : '' }}>40歳〜49歳</option>
                                <option value="5" {{ old('age') == 5 ? 'selected' : '' }}>50歳〜59歳</option>
                                <option value="6" {{ old('age') == 6 ? 'selected' : '' }}>60歳〜</option>
                            </select>
                            <br>

                            お問い合わせ内容
                            <br>
                            <textarea name="contact">{{ old('contact') }}</textarea>
                            <br>
                            <input type="checkbox" id="caution" name="caution">注意事項に同意する
                            <br>

                            <button type="submit" class="btn btn-primary">
                                新規登録する
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
