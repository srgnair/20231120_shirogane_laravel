<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理システム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>

    <div class="admin">

        <div class="admin__title">
            <h2>管理システム</h2>
        </div>

        <div class="admin__form">
            <form class="form" action="/find" method="post">
                @csrf
                <div class="form__group--wrapper">
                    <div class="form__group">
                        <div class="form__group--label"> <span>お名前</span></div>
                        <input class="form__input" type="text" name="last_name" value="{{ old('last_name') }}" />
                    </div>
                    <div class="form__group">
                        <div class="form__group--label"> <span>性別</span></div>
                        <input class="form__radio" type="radio" name="gender" style="transform:scale(2.0)" value="3" checked>
                        <label for="gender">全て</label>
                        <input class="form__radio" type="radio" name="gender" style="transform:scale(2.0)" value="1">
                        <label for="gender">男性</label>
                        <input class="form__radio" type="radio" name="gender" style="transform:scale(2.0)" value="2" required>
                        <label for="gender">女性</label>
                    </div>
                    <div class="form__group">
                        <div class="form__group--label"> <span>登録日</span></div>
                        <input class="form__input" type="date" name="timestamp" value="{{ old('timestamp') }}" />
                        <span>-</span>
                        <input class="form__input" type="date" name="created_at" value="{{ old('created_at') }}" />
                    </div>
                    <div class="form__group">
                        <div class="form__group--label"> <span>メールアドレス</span></div>
                        <input class="form__input" type="text" name="email" value="{{ old('email') }}" />
                    </div>

                    <div class="button__wrapper">
                        <div class="button__search">
                            <button class="form__button-search" type="submit">検索</button>
                        </div>
                        <div class="button__search">
                            <a href="" class="form__button-reset" type="reset">リセット</a>
                        </div>
                    </div>
            </form>
        </div>

        <div class="admin__table">
            {{ $contacts ->links() }}
            <table class="">
                <thead class="admin__th">
                    <tr>
                        <th>ID</th>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>ご意見</th>
                        <th>
                        <th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($contacts as $contact)
                    <form class="delete-form" action="find" method="POST">
                        @method('DELETE')
                        @csrf
                        <tr class="admin_tr">
                            <td class="admin_td">{{$contact->id}}</td>
                            <td class="admin_td">{{$contact->last_name}}</td>
                            <td class="admin_td">{{$contact->gender}}</td>
                            <td class="admin_td">{{$contact->email}}</td>
                            <td class="admin_td">
                                <div class="opinion_wrapper">{{$contact->opinion}}
                                </div>
                            </td>
                            <td class="admin_td">
                                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                <button class="form__button-delete" type="submit">削除</button>
                            </td>
                        </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>