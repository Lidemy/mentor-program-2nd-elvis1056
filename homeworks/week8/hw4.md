## 什麼是 DNS？Google 有提供的公開的 DNS，對 Google 的好處以及對一般大眾的好處是什麼？

Ans.
DNS全名(Domain Name System)，網域名稱系統
他是一個轉譯系統
由於網路中，電腦透過稱為「網際網路通訊協定」的數字字串或ip位址相互通訊
這些ip與我們日常使用的語言大不相同，所以我們需要這個系統
將電腦間的ip(一堆數字 0.0.0.0)轉換為我們平常的語言(www.google.com)

對GOOGLE的好處：
透過收集大眾的資訊，方便進行數據統計分析
透過這個管道行銷GOOGLE這個品牌

對一般大眾的好處：
公司較大(安全控管應該比較嚴格)

參考資料：
https://tw.godaddy.com/help/dns-665

## 什麼是資料庫的 lock？為什麼我們需要 lock？

Ans.
鎖定是為了阻擋多位使用者同時修改資料庫內容，避免出現未預期的狀況
確保交易的一致性，同一時間內只允許一比交易對其特定資料表進行讀寫

參考資料：
https://ithelp.ithome.com.tw/articles/10106976
http://terence-mak.blogspot.com/2013/10/sql-server-lock.html
http://sharedderrick.blogspot.com/2007/12/blocked-lock-connectoin.html


## NoSQL 跟 SQL 的差別在哪裡？

Ans.

SQL：關聯式資料庫，需要事先定義Schema(如資料型態、欄位)，使用SQL語法做操作
NoSQL：非關聯式資料庫，不需要定義Schema，查詢資料較慢通常格式為JSON

參考資料：
https://www.ithome.com.tw/news/92506
https://ithelp.ithome.com.tw/articles/10187443

## 資料庫的 ACID 是什麼？

Ans.

Atomicity(單元性)
將交易過程的所有對資料庫操作視為同一個單元工作，其中可能包括許多步驟，
這些步驟要嘛全部執行成功，否則，整個交易宣告失敗

Consistency(一致性)
交易在系統完整性中實施一致性，這通過保證系統的任何交易最後都處於有效狀態來實現。如果交易成功完成，那麼系統中所有變化將正確地應用，系統處於有效狀態。如果在交易中出現錯誤，那麼系統中的所有變化將自動地回滾，系統返回到原始狀態。

isolation(隔離性)
隔離性是指多筆交易在同時交易時，雖然各交易是並行執行，不過各交易之
間應該滿足獨立性，也就是說，一個交易不會影響到其它交易的執行結果，或被
其它交易所干擾。

durability(持久性)
持久性是指當交易完成執行確認交易（Commit）後，資料庫會保存交易後的結果。
因此，若系統發生錯誤或故障時，等系統恢復正常時，原交易的結果仍必須存在，
也不能遺失現象。

參考資料：
http://www.woolycsnote.tw/2017/07/54-transaction-acid.html
https://www.itread01.com/article/1423791388.html