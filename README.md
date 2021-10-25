<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

[documentation](https://laravel.com/docs) 

## SetUp

■参照サイト「WindowsでXAMPPを使えばLaravel環境構築」
<pre>
https://reffect.co.jp/laravel/windows-xampp-laravel-install
</pre>

■xammp インストール
XAMPP for Windows 7.3.28 (PHP73)

■mysql インストール
<pre>
https://www.mysql.com/jp/
https://dev.mysql.com/downloads/file/?id=505213

User:sample_user
Pass:sample_pass

GRANT ALL PRIVILEGES ON laravel_db_dev.* TO sample_user@localhost;

http://localhost/phpMyadmin/index.php
</pre>

■composer インストール
<pre>
https://getcomposer.org/

C:\Users\sample_user>composer -v
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 2.1.1 2021-06-04 08:46:46

□PATHチェック

C:\Users\sample_user>where composer
C:\ProgramData\ComposerSetup\bin\composer
C:\ProgramData\ComposerSetup\bin\composer.bat

C:\Users\sample_user>where php
C:\xampp\php\php.exe
</pre>

■Laravel インストール
<pre>
C:\xampp\htdocs>composer create-project --prefer-dist laravel/laravel laravel "6.*"

***
******
Package manifest generated successfully.
67 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
> @php artisan key:generate --ansi
Application key set successfully.
</pre>

■VSCODE 拡張パッケージ
<pre>
vscode-icon
php intelephense
php debug
japanese pk
</pre>

■環境修正
<pre>
□メールのSMTPをLOGへ変更
\htdocs\laravel\.env
-----------------------
MAIL_DRIVER=log
MAIL_HOST=
MAIL_PORT=
-----------------------

□DBセット
\htdocs\laravel\.env
-----------------------
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_db_dev
DB_USERNAME=sample_user
DB_PASSWORD=sample_pass
-----------------------
</pre>

■Laravel 

http://127.0.0.1:8000/

## Contributing

■アプリラン
<pre>
C:\xampp\htdocs\laravel>php artisan serve
Laravel development server started: http://127.0.0.1:8000
</pre>

■モデル
<pre>
□run
C:\xampp\htdocs\laravel>php artisan serve

□migrate
C:\xampp\htdocs\laravel>php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (0.14 seconds)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (0.18 seconds)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (0.12 seconds)

□作成
php artisan make:model User
</pre>

■ルーティング
<pre>
routes\web.php
-----
Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');
-----

□参照先
resources\views\welcome.blade.php
</pre>

■コントローラー
<pre>
php artisan make:controller UserController
↓作成
app\Http\Controllers\UserController.php

・一覧表示のための最低限の実装
―――――――
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::orderBy('created_at', 'desc')->get();
  
        return view('users.index', [
          'user' => $users,
        ]);
      }
}

―――――――

→return view ***** ：テンプレートの呼出しと変数のアサイン
</pre>

■View
<pre>
src/resources/views/
├── base.blade.php
└── users
    └── index.blade.php 
</pre>

■カラム追加　マイグレーション
<pre>
C:\xampp\htdocs\laravel>php artisan make:migration add_public_flg_to_users_table --table=posts
Created Migration: 2021_06_20_082047_add_public_flg_to_users_table

C:\xampp\htdocs\laravel>php artisan migrate
Migrating: 2021_06_20_082047_add_public_flg_to_users_table
Migrated:  2021_06_20_082047_add_public_flg_to_users_table (1.01 seconds)
</pre>


■ログイン機能実装コマンド
<pre>
C:\xampp\htdocs\laravel> composer require laravel/ui "^1.0" --dev
C:\xampp\htdocs\laravel> php artisan ui vue --auth

※6系だとphp artisan make:auth が使えないため↑のようなコマンドで代用

サンプルデータをSeederを使用して登録

C:\xampp\htdocs\laravel> php artisan make:seeder UsersTableSeeder
C:\xampp\htdocs\laravel> composer dump-autoload
C:\xampp\htdocs\laravel> php artisan db:seed --class=UsersTableSeeder
※ダミーデータの削除とDBの再生成
C:\xampp\htdocs\laravel> ##php artisan migrate:refresh --seed

生成ルート
/home					GET		HomeController@index							マイページ表示
/register				GET		RegisterController@showRegistrationForm			ユーザー登録表示
/register				POST	RegisterController@register						ユーザー登録
/login					GET		LoginController@showLoginForm					ログイン表示
/login					POST	LoginController@login							ログイン
/logout					POST	LoginController@logout							ログアウト
/password/reset			GET		ForgotPasswordController@showLinkRequestForm	パスワードリマインダー画面
/password/email			POST	ForgotPasswordController@sendResetLinkEmail		パスワードリマインド
/password/reset/{token}	GET		ForgotPasswordController@showResetForm			パスワード再入力画面
/password/reset			POST	ForgotPasswordController@reset					パスワード更新
/email/verify			GET		VerificationController@show						Eメール認証画面
/email/verify/{id}		GET		VerificationController@verify					Eメール認証
/email/resend			GET		VerificationController@resend					Eメール認証メール再送信
</pre>
