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

                        <form method="GET" action="{{ route('contact.edit', ['id' => $contact->id]) }}">
                            {{ $contact->your_name }}
                            <br>
                            {{ $contact->title }}
                            <br>
                            {{ $contact->email }}
                            <br>
                            {{ $contact->url }}
                            <br>
                            {{ $gender }}
                            <br>
                            {{ $age }}
                            <br>
                            {{ $contact->contact }}
                            <br>

                            <button type="submit" class="btn btn-primary">
                                変更する
                            </button>
                        </form>

                        <form method="POST" action="{{ route('contact.destroy', ['id' => $contact->id]) }}"
                            id="delete_{{ $contact->id }}">
                            @csrf
                            @method('delete')
                            <a href="#" data-id="{{ $contact->id }}" onclick="deletePost(this)"
                                class="btn btn-danger" style="margin-top: 10px;">削除する</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(e) {
            'use strict'
            if (confirm('本当に削除していいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>
@endsection
