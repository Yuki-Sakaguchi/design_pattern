/**
 * @class オブザーバーパターン.
 */
class Observer {
  constructor () {
    this.observers = {}
  }

  /**
   * 名前とコールバックのセットで通知を登録する
   * @param {string} name 
   * @param {callback} cb 
   */
  on (name, cb) {
    if (!(name in this.observers)) {
      this.observers[name] = []
    }
    this.observers[name].push(cb)
  }

  /**
   * 名前に紐づくコールバックを実行する
   * @param {string} name 
   * @param {...any} args 
   */
  emit (name, ...args) {
    if (name in this.observers) {
      this.observers[name].forEach(cb => cb(...args))
    }
  }
}


// 実行 -----------------------------------
const observer = new Observer()
observer.emit('test') //-> 関数がないので特に実行されない
observer.on('test', () => console.log('test!!!'))
observer.emit('test') //-> "test!!!"
