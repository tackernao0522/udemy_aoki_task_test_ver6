@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('contact.create') }}" class="btn btn-primary mb-2">新規登録</a><br>

                        <form method="GET" action="{{ route('contact.index') }}" class="form-inline mb-2">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索"
                                aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                        </form>

                        @if (!$contacts->isEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">氏名</th>
                                        <th scope="col">件名</th>
                                        <th scope="col">登録日時</th>
                                        <th scope="col">詳細</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
                                            <td>{{ $contact->your_name }}</td>
                                            <td>{{ $contact->title }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td><a href="{{ route('contact.show', ['id' => $contact->id]) }}">詳細を見る</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $contacts->links() }}
                        @else
                            <br>
                            データはありません。
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
