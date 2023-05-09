![readme_logo](https://raw.githubusercontent.com/draobfrus/laravel_post_app/add_images/readme_logo.png)

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
  <img src="https://img.shields.io/badge/php-v8.2.4-blueviolet">
  <img src="https://img.shields.io/badge/laravel-v9.52.5-ff69b4">
</p>
<br />

## サービス概要

「せっかく買うなら、お墨付きを。」<br>
コンビニマスターは、自炊派で、あまりコンビニに行かない人にこそ使ってほしい、コンビニのおすすめ商品を投稿し合うサービスです。</br>

<br />

## 使い方

1. 投稿一覧を見る（投稿のタイトルで検索も可能です）
2. 投稿を作成する（おすすめ商品があったらぜひ投稿してください！）
3. 自分の投稿を確認（自分の投稿であれば、いつでも編集・削除ができます）
4. 投稿のブックマーク（お気に入りの投稿があればブックマークして、いつでも見返すことができます）

<br />

## 使用技術

### バックエンド

-   PHP v8.2.4
-   Laravel v9.52.5

### フロントエンド

-   TailwindCSS
-   Breeze

### インフラ

-   Apache
-   AWS
    -   EC2
    -   RDS（MySQL）
    -   S3
    -   Route53

<br />

## テーブル設計

<br>

-   users（登録ユーザー情報）
-   posts（投稿内容）
-   mst_stores（代表的なコンビニ店舗名を格納）
-   bookmarks（ブックマーク）

<br>

<a href="https://gyazo.com/acef91891daab8ef532005dedd75177b"><img src="https://i.gyazo.com/acef91891daab8ef532005dedd75177b.png" alt="Image from Gyazo" width="903"/></a>
<br>
<br />

## ライセンス

本コードは [MIT ライセンス](https://opensource.org/licenses/MIT)に準拠しています。
