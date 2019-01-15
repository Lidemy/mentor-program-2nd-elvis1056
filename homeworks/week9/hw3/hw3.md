Event Loop 前情題要

1. JavaScript為什麼是單線程的？
2. JavaScript為什麼需要異步？
3. JavaScript既然是單線程又要怎麼實現異步？

Ans.1
場景描述：留言版編輯及刪除
假使JS是多線程，現在有兩個process同時進行，簡單稱呼他們為process1、process2
process1對某留言進行刪除，另一方面process2對同一留言進行了編輯，瀏覽器這時候便不清楚要以哪個為主
所以JS因此被設計為單線程。

Ans2.
假使JS沒有異步，由於是單線程的緣故，只能由上而下執行程式碼
假使某程式碼解析時間很長，那麼下面的程式碼便會塞車。
對於使用者來說就是所謂的卡死，造成很差的使用者體驗。

Ans3.
事件驅動(Event-driven)機制中
透過事件循環(event loop)、事件隊列（Event Queue)來實現異步
所以理解了event loop機制，就理解了JS的執行機制

Ans. Event Loop 不太知道畫圖怎麼畫，使用文字敘述
原始程式碼、Call Stack、Web Api、Callback Queue、Result

1.首先執行console.log(1)，放進Call Stack，執行後將結果<1>放入Result
2.再來執行setTimeout(() => {console.log(2)}, 0)，放進Call Stack
  ，再放進Web Api計時0秒後，到Callback Queue等待處理
3.執行console.log(3)，放進Call Stack，執行後將結果<3>放入Result
4.再來執行setTimeout(() => {console.log(4)}, 0)，放進Call Stack
  ，再放進Web Api計時0秒後，然後到Callback Queue等待處理
5.執行console.log(5)，放進Call Stack，執行後將結果<5>放入Result
6.瀏覽器會持續檢查Call Stack、Callback Queue還有沒有沒執行的
  (執行順序為 Call Stack > Callback Queue)
7.Callback Queue首先發現console.log(2)，將他放進Call Stack，執行後將結果<2>放入Result
8.Callback Queue再發現console.log(4)，將他放進Call Stack，執行後將結果<4>放入Result
9.所有Result執行結果如下：13524

參考資料：https://hk.saowen.com/a/61056de2c0a85f3fbc79397aec3af4976011a5003e5f28c4ccec2178379cd22a
https://pjchender.blogspot.com/2017/08/javascript-learn-event-loop-stack-queue.html
https://github.com/Lidemy/mentor-program-2nd-yuchun33/blob/568b84e561e8c85bd61c3be7282db3587cf365e3/homeworks/week9/hw3/hw3.md