@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
    </div>

    <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group--title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--text">
                    <div class="form__input--wrapper">
                        <div class="form__input--left">
                            <input class="form__input--text" type="text" name="last_name" value="{{ old('last_name') }}" />
                            <p>例）山田</p>
                        </div>
                        <div class="form__input--right">
                            <input class="form__input--text" type="text" name="first_name" value="{{ old('first_name') }}" />
                            <p>例）太郎</p>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group--radio">
                <div class="form__input--radio">
                    <input class="form__radio--left" type="radio" name="gender" style="transform:scale(2.0)" value="1" checked>
                    <label for="gender">男性</label>

                    <input class="form__radio--right" type="radio" name="gender" style="transform:scale(2.0)" value="2" required>
                    <label for="gender">女性</label>

                </div>
                <div class=" form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--text">
                    <div class="form__input--wrapper">
                        <div class="form__input--left">
                            <input class="form__input--text" type="text" name="email" value="{{ old('email') }}" />
                            <p>例）test@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--title">
                <span class="form__label--item">郵便番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--text">
                    <div class="form__input--wrapper">
                        <span>〒</span>
                        <div class="form__input--left">
                            <input class="form__input--text" type="text" name="postcode" value="{{ old('postcode') }}" />
                            <!--pattern="\d{3}-\d{4}" inputmode="numeric" minlength="7" maxlength="8"-->
                            <p>例）123-4567</p>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('postcode')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--text">
                    <div class="form__input--wrapper">
                        <div class="form__input--left">
                            <input class="form__input--text" type="text" name="address" value="{{ old('address') }}" />
                            <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--text">
                    <div class="form__input--wrapper">
                        <div class="form__input--left">
                            <input class="form__input--text" type="text" name="building_name" value="{{ old('building_name') }}" />
                            <p>例）千駄ヶ谷マンション101</p>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('building_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group--title">
                <span class="form__label--item">ご意見</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--textarea">
                    <textarea name="opinion">{{ old('opinion') }}</textarea>
                </div>
                <div class="form__error">
                    @error('opinion')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button--submit" type="submit">確認</button>
        </div>
    </form>
</div>
@endsection