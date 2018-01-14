<?php
  /**
   * ストラテジーパターン（ストラテジー ＝ 戦略）
   *   共通する処理を関数化するのが、手続き型のアプローチ
   *   ストラテジーパターンは共通しない処理を分割し（サブクラスに分ける）
   *   共通するクラスからそれを読み込んで使う
   *   フレームワークなどの作り方でよく使われている。
   *   「処理の流れ」を定義してあげて、ここに分かれている処理をそこから呼び出す。
   */

  /**
   * ストラテジーパターンの元クラス
   */
  abstract class MessageSend {
    protected $name;
    protected $message;

    public function __construct($name, $message) {
      $this->name = $name;
      $this->message = $message;
    }

    // 実行
    public function execute() {
      // 共通する前処理
      echo "---<br>";
      echo "送信の前処理<br>";

      // 共通しない個別の処理
      $this->send();

      // 共通する後処理
      echo "送信の後処理<br>";
      echo "---<br>";
      echo "<br>";
    }

    // 共通しない処理はサブクラスに任せる
    public abstract function send();
  }

  /**
   * メール送信
   */
  class Mail extends MessageSend {
    public function send() {
      echo "---<br>";
      echo "メールを送信します<br>";
      echo "from ".$this->name."<br>";
      echo "content ".$this->message."<br>";
      echo "---<br>";
    }
  }

  /**
   * ツイッター送信
   */
  class Twitter extends MessageSend {
    public function send() {
      echo "---<br>";
      echo "ツイートを送信します<br>";
      echo "from ".$this->name."<br>";
      echo "content ".$this->message."<br>";
      echo "---<br>";
    }
  }

  
  // 実行 ------------------------------------------
  header('Content-Type: text/html; charset=UTF-8');

  $mail = new Mail("田中", "あそぼーぜー！");
  $mail->execute();

  $twitter = new Twitter("佐藤", "明日空いてる？");
  $twitter->execute();
?>