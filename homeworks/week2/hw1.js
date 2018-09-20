function printstars(i){
	var result = ""
	for(var j = 1 ; j<=i ; j++) {
		result += "*"
	}
	return result
}

function stars(n) {
	var arr = []
	for(var i = 1 ; i<=n ; i++){
		arr.push(printstars(i))
	}
	return arr
}

console.log(stars(10))

module.exports = stars;