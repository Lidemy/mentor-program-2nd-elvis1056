## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

Ans.
	
	VARCHAR 和 TEXT 儲存字元上限差距(影響儲存容量)
	VARCHAR 可以設定預設值
	TEXT 不允許設定預設值

	VARCHAR: 

	MySQL 5.0.3 以上版本，支援0-65535byte (可以存放65532個字元，起始位和結束位占去了3個字元)
	MySQL 5.0.3 以下版本，支援0-255byte
	在5.0.3以下版本中需要使用固定的TEXT或BLOB格式存放的數據
	可以在高版本中使用可變長的varchar來存放，這樣就能有效的減少數據庫文件的大小。

	參考網站：
	https://www.jianshu.com/p/cc2d99559532
	https://www.itread01.com/content/1494996129.html
	https://hk.saowen.com/a/62c16011c8f09f371cf494f107ad43fe7209a79521f8887d59a13c02097b506d
	https://code-examples.net/zh-TW/q/76576d
	https://blog.csdn.net/LJFPHP/article/details/80452686
	http://wubx.net/varchar-vs-text/

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？

Ans.

	Cookie是屬於一種小型的文字檔案

	Client 端向 Web Server 要求某個網頁，同時也會將符合的 Cookie 資訊傳送到 Server 端
	當 Client 端取得 Server 端返回的網頁時，瀏覽器會將返回回來的 Cookie 資料記錄到電腦的資料夾中

	參考網站：
	https://dotblogs.com.tw/jasonyah/2013/10/06/explain-http-cookie-in-detail
	https://developer.mozilla.org/zh-TW/docs/Web/HTTP/Cookies
	https://blog.xuite.net/octopus12209/wretch/135543573-%E9%9B%BB%E8%85%A6%E8%A3%A1%E7%9A%84cookies%E6%98%AF%E4%BB%80%E9%BA%BC%3F
	http://www.vixual.net/blog/archives/12
	https://progressbar.tw/posts/91

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

	對於帳號密碼的驗證安全性不足
	有可能透過cookie而造成被偷取資料的風險