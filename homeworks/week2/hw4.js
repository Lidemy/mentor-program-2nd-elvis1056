function isPalindromes(str) {
  return str === reverse(str)
}

function reverse(str){
  let result = ""
  for(var i = str.length-1 ; i>=0 ; i--){
  	result += str[i]
  }
  return result
}
console.log(isPalindromes("abcba"))

module.exports = isPalindromes