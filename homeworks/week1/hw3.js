function reverse(str) {
	var reverseStr = ""
	for(var i = str.length - 1; i>=0; i--){
		reverseStr += str[i]
	}
	return reverseStr
}
console.log(reverse("yoyoyo"))
console.log(reverse("1abc2"))
console.log(reverse("1,2,3,2,1"))