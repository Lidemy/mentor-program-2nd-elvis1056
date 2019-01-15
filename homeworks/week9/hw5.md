## CSS 預處理器是什麼？我們可以不用它嗎？

Ans.預處理器使用更簡單、易讀、方便維護的語法去寫出CSS
	
	巢狀(nesting)：有層次的排列方式讓我們更清楚層級間的關係
	變數(variables)：變數可以讓同一個屬性被使用在很多個地方，當這個屬性要改變時，只需要改一個地方
	混入(mixin)：多個屬性的組合成一組後被使用，可以重複使用這組樣式
	繼承(extend)：某一個元素可以得到使用@extend的屬性，撰寫時使用@extend並接設定好的值

參考資料：
https://github.com/cssmagic/blog/issues/73
https://www.itread01.com/content/1542575286.html
https://ithelp.ithome.com.tw/articles/10194446?sc=iThelpR
https://blog.csdn.net/zhouziyu2011/article/details/67646875

## 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。

Ans.Expires(過期)
	作用：當流覽器收到這個response，檢視現在時間是否過期，如果未過期便從已經有的資料拿(存在Cache中)，若過期便發Request去取得

	Etag
	作用：檔案內容更動與否當作條件，透過特定亂數與server溝通，進而回傳Response是否需要向它拿資料，沒有便回傳304。

## Stack 跟 Queue 的差別是什麼？

Ans.
佇列(Queue)是用先進先出的方式處理物件的集合，例如到銀行排隊，先排的人先處理；
堆疊(Stack )是後進先出的集合，例如玩撲克牌排遊戲時，發牌時是從整疊的最上一張拿取。

參考資料：
http://rhroan.pixnet.net/blog/post/40623332-queue-and-stack

## 請去查詢資料並解釋 CSS Selector 的權重是如何計算的（不要複製貼上，請自己思考過一遍再自己寫出來）

Ans.
CSS規範，具體性越明確的樣式規則，權重值越高

!important > inline style > ID > class > element > *

使用類似陣列的表示方式圖像化呈現 [0,0,0,0,0]
(在此的數字並非進位在用的數字)

[1,0,0,0,0] !important
[0,1,0,0,0] style=''
[0,0,1,0,0] #id
[0,0,0,1,0] .myclass 偽類
[0,0,0,0,1] div li ul

參考資料：
https://ithelp.ithome.com.tw/articles/10196454
https://zhuanlan.zhihu.com/p/50322177
https://muki.tw/tech/css-specificity-document/
https://hk.saowen.com/a/f11ff729ede977909d0f2a8c6c58d196c60b88c9296572f7c530963d50ec466c