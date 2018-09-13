function capitalize(str){
	var char = str[0]
	if (char >= "a" && char <= "z"){
		str = str.replace(char, char.toUpperCase())
		
	}
	return str
}
console.log(capitalize("nick"))
console.log(capitalize("Nick"))
console.log(capitalize(",hello"))