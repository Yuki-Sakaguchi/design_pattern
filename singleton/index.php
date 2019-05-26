<?php
  /**
   * シングルトンパターン
   *   システム内で、インスタンスが一つしかないことを保証するパターン
   *   どこからいつ呼んでも同じインスタンスが共通で使われるので、
   *   システム内で共有したい値などに使う
   */

  class Singleton {
    // インスタンスを内部に保持する
    private static $instance;

    // インスタンスの生成をprivateにする
    private function __construct() {
      echo "シングルトンインスタンスを生成しました<br>";
    }

    // インスタンス生成用のメソッドを作成
    // インスタンス作成はこれでやる
    public static function getInstance() {
      // インスタンスが生成されていなければ作り、内部に保存
      if (!isset(self::$instance)) {
        self::$instance = new Singleton();
      }

      // 内部に保存されているインスタンスを返す
      return self::$instance;
    }
  }

  // インスタンスが同じものか確認するメソッド
  function equalInstance($ins1, $ins2) {
    if ($ins1 === $ins2) {
      echo "インスタンス１と２は同じものです。<br>";
    } else {
      echo "インスタンス１と２は違うものです。<br>";
    }
  }


  // 実行 ------------------------------------------
  date_default_timezone_set('Asia/Tokyo');
  header('Content-Type: text/html; charset=UTF-8');

  // シングルトンでインスタンスを幾つか作ってみる
  $singleton1 = Singleton::getInstance();
  $singleton2 = Singleton::getInstance();
  // $singleton3 = new Singleton(); //-> cunstructがprivateなのでエラーになる

  // シングルトンなので同じインスタンス
  equalInstance($singleton1, $singleton2);

  echo "<br>";

  // 普通のクラスでインスタンスを幾つか作ってみる
  $date1 = new DateTime();
  $date2 = new DateTime();

  // 別々のインスタンス
  equalInstance($date1, $date2);
?>