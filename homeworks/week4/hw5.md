## hw5：簡答題

1. 什麼是 DOM？
	
	是一種介面，全名是物件檔案模型（Document Object Model）
	可以將一個 HTML 文件或 XML 文件都看成一種 DOM，
	每個文件內的標籤都看成是 DOM 的元素或是節點。

	將Document架構為一個樹(Tree)的概念，
	Tree的組成成份就是節點(Node)，

	每個DOM必須要有一個document的根節。
	每個元素在DOM裡面就是一個節點。

2. 什麼是 Ajax？
	
	Ajax 的全名是 Asynchronous Javascript and XML
	目的：用於提高用戶體驗，減少網絡數據的傳輸量
	過去網頁每個的點擊更新，都需將整份網頁重新載入，除了耗時並消耗網路速度重複取得資料
	因此便產生了Ajax這項由多種技術集合而成，不必刷新整個頁面，只需對頁面的局部進行更新，
	可以節省網絡帶寬，提高頁面的加載速度，從而縮短用戶等待時間，改善用戶體驗

	透過XMLHttpRequest向伺服器收送資料，並透過javaScript操作DOM，
	來達到即時更動介面及內容，不需要重新讀取整個網頁

3. HTTP method 有哪幾個？有什麼不一樣？
	
	get：取得我們想要的資料。
	post：新增一項資料。（如果存在會新增一個新的）
	put：新增一項資料，如果存在就覆蓋過去。（還是只有一筆資料）。
	patch：附加新的資料在已經存在的資料後面。（資料必須已經存在，patch會擴充這項資料）
	options：用來得到特定資源的相關資訊。(請求從伺服器取得支援)
	delete：刪除資料。

4. `GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？
	
	有兩種方法（HTTP methods）可以將資料送到Web Server端

	#GET
		當使用GET的方法時，會將表單資訊附加在URL上並作為QueryString的一部分，
		QueryString是一種key/value的組合，從問號「?」開始，每一組值都是用「&」隔開
		將資料送到Web Server時，可以透過瀏覽器的網址看到完整的URL和QueryString，具有高風險性且有有長度的限制。
		有心的人可以透過操控QueryString字串的方式來取得或破壞資料庫的資料。

	#POST
		當使用POST方法是將要傳送的資訊放在message-body中，
		資料無大小的限制，可以防止使用者操作瀏覽器網址，
		表單資料被隱藏在message-body中，因此較常使用POST方法將表單資料傳到Web Server端。
		可以透過httpwatch觀察POST 方法Http Request封包的內容

5. 什麼是 RESTful API？

	REST 全名 Resource Representational State Transfer，是一套設計架構
	REST指的是網路中Client端和Server端的一種呼叫服務形式，透過既定的規則及約束的條件，對HTTP進行操作
	這些操作像是
	HTTP Method: GET、POST、PUT、PATCH和DELETE
	可以對應到資料庫基本操作CRUD
	CRUD 為 Create(新增)、Read(讀取)、Update(更新)與Delete(刪除)的縮寫

	透過 HTTP 為基礎來設計 RESTful API，讓人更簡單的看懂而產生

6. JSON 是什麼？

	JSON (Javascript Object Notation) 是資料交換的格式，是 Javascript 衍生出的一項功能
	相較餘XML更容易人理解、閱讀和編寫，同時也易於機器讀取和執行更簡化程式碼

	格式：JSON 字串可以包含陣列 Array 資料或者是物件 Object 資料

7. JSONP 是什麼？
	
	JSONP (JSON with Padding)
	JSON是理想的數據交換格式，但沒辦法跨域直接獲取，
	於是就將JSON包裹在一個能夠跨域的JS語法中，作為JS文件傳過去

8. 要如何存取跨網域的 API？

	比較常用的是兩種方式
	1. JSONP
		利用 DOM 中的 Script 元素在載入遠端的 JavaScript，進而透過 Callback 回傳資料

	2. W3C - CORS (Cross-Origin Resource Sharing)
		
		分成兩種狀況
		same-origin requests (always allowed)
		Cross-origin requests (controlled by CORS)

		Response Header：Access-Control-Allow-Origin
		伺服器端如果沒有輸出的話就沒辦法去使用他的東西
