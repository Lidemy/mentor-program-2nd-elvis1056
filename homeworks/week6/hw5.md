## 請說明 SQL Injection 的攻擊原理以及防範方法

Ans.SQL攻擊、SQL隱碼攻擊或SQL注入攻擊
	透過網頁程式所使用的「結構話查詢語言」，在網頁中的資料輸入欄未(如帳號/密碼)或網址列的參數(如xxxx?id=111)夾帶惡意的SQL語法。


## 請說明 XSS 的攻擊原理以及防範方法

Ans.跨網站指令碼攻擊
	
	Stored XSS (儲存型)
	會被保存在伺服器資料庫中的 JavaScript 代碼引起的攻擊即為 Stored XSS，最常見的就是論壇文章、留言板等等，因為使用者可以輸入任意內容，若沒有確實檢查，那使用者輸入如 <script> 標籤等關鍵字就會被當成正常的 HTML 執行，標籤的內容也會被正常的作為 JavaScript 代碼執行

	Reflected XSS (反射型)
	網頁後端沒有過濾掉惡意字元，直接回傳的內容理所當然會變成正常的代碼執行。
	而此手法需透過特定網址點入，因此攻擊者通常會以釣魚手法、社交工程等方式誘騙受害者點入連結，但因為代碼都在網址上

	DOM-Based XSS (基於 DOM 的類型)

	防範方式：
	使用 htmlspecialchars() 函數，過濾使用者輸入標籤
	使用 htmlentities() 函數，過濾使用者輸入標籤

	參考網站：
	https://forum.gamer.com.tw/Co.php?bsn=60292&sn=11267
	http://stockwfj3.pixnet.net/blog/post/61087035-%5Bphp%5Dhtmlentities-%E2%80%94-%E5%87%BD%E6%95%B8%E6%8A%8A%E5%AD%97%E7%AC%A6%E8%BD%89%E6%8F%9B%E7%82%BA-html-%E5%AF%A6%E9%AB%94
	https://segmentfault.com/a/1190000007766732

## 請說明 CSRF 的攻擊原理以及防範方法

Ans.

	Cross-site request forgery 跨站偽造請求
	CSRF攻擊的主要目的是讓用户在不知情的情况下攻擊自己已登錄的一个系統
	透過網站上某個圖片吸引你去點擊，此時觸發某個JS事件，
	讓使用者在不知情的狀況下發送刪除等等，非本人操作造成的問題。

	防禦方法：
	透過referer、token(口令牌)或者驗證碼來檢測用戶提交。
	盡量不要在頁面連結中暴露用戶隱私訊息。
	對於用戶修改、刪除操作最好使用POST操作。
	避免全站通用的cookie，嚴格設置cookie。

	參考網站：
	https://blog.techbridge.cc/2017/02/25/csrf-introduction/
	https://www.jianshu.com/p/ffb99fc70646
	https://blog.csdn.net/yusirxiaer/article/details/79139260

## 請舉出三種不同的雜湊函數

Ans.

	1.MD5(Message-Digest Algorithm 5)
	2.SHA-256
	3.BLAKE2

	雜湊和加密不一樣，
	雜湊不可逆，無法逆向解出原始輸入
	加密可逆，可以透過解密得到原文

	參考網站：
	https://ithelp.ithome.com.tw/articles/10156209
	https://blog.m157q.tw/posts/2017/12/25/differences-between-encryption-and-hashing/
	https://ithelp.ithome.com.tw/articles/10156209

## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別

Ans.
	什麼是 Cookie 是一個純文字型的檔案，儲存在瀏覽工具的目錄中，
	而在執行瀏覽工具時，會載入RAM記憶體中
	什麼是 Session 是一種概念，用來紀錄使用者資訊

	Cookie 是儲存在 Client 端 
	Session 是儲存在 Server 端，比起 Cookie 相對安全

	Cookie 像是一張領餐的號碼牌
	Session 像是是一張數位會員卡 ( 可以記錄細節，像是Session ID，透過檢查會員卡保持連線狀態)

	參考網站：
	https://blog.xuite.net/octopus12209/wretch/135543573-%E9%9B%BB%E8%85%A6%E8%A3%A1%E7%9A%84cookies%E6%98%AF%E4%BB%80%E9%BA%BC%3F
	https://progressbar.tw/posts/91
	https://progressbar.tw/posts/92
	http://fred-zone.blogspot.com/2014/01/web-session.html

## `include`、`require`、`include_once`、`require_once` 的差別

	require_once 的作用和 require 是幾乎相同的，唯一的差別在於 require_once 會先檢查要引入的檔案是不是已經在該程式中的其他地方被引入過了；如果有的話，就不會再次重複引入該檔案

	require() 通常來導入靜態的內容，而 include() 則適合用來導入動態的程序代碼
	
	無論如何都要引用某個檔案，則使用 require 或 include 皆可。若您需經條件判斷之後，才能決定是否引用該檔案的話，則只能使用 include

	include 和 include_once
	都是用來引入檔案，後者可避免重複引入，故建議用後者。引不到檔案會出現錯誤息，但程式不會停止。

	require 和 require_once
	都是用來引入檔案，後者可避免重複引入，故建議用後者。引不到檔案會出現錯誤息，而且程式會停止執行。

	│             Type             │     include         │     require           │
	│      引入(靜態/動態)內容      │ 動態內容             │ 靜態內容               │
	│       引入檔案發生錯誤時      │ 會顯示錯誤，繼續執行  │ 會顯示錯誤，立刻終止程式 │
	│  透過條件判斷後才決定引入檔案  │ 可以使用我           │ 不可以使用我            │
	│            使用方法          │ 要使用時才引用        │ 通常寫於code的開始處    │
	│            迴圈使用          │ 可以                 │ 不行                   │

	參考網站：
	https://blog.csdn.net/yongh701/article/details/47972483
	http://sboxtu.blogspot.com/2012/04/php-require-vs-include.html
	http://injerry.pixnet.net/blog/post/39082306-%5Bphp%E6%95%99%E5%AD%B8%5D---%E5%88%9D%E5%AD%B8%E8%80%85%E6%9C%80%E6%98%93%E6%B7%B7%E6%B7%86%E7%9A%84include%E3%80%81include_once
	https://sanji0802.wordpress.com/2008/02/25/php%E5%BC%95%E7%94%A8%E6%AA%94%E6%A1%88%E7%9A%84%E5%87%BD%E6%95%B8%E5%8D%80%E5%88%A5requirerequire_onceincludeinclude_once/