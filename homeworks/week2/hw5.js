function add(a, b) {
  const arrA = a.split("").reverse()
  const arrB = b.split("").reverse()
  const ans = [""]
  const length = Math.max(arrA.length, arrB.length)

  let carry = 0
  for(let i = 0 ; i<length ; i++) {
  const n = Number(arrA[i] || 0) + Number(arrB[i] || 0) + carry
  ans[i] = n % 10
  carry - Math.floor(n / 10) 
  }

  if (carry) {
  ans.push(carry)
  }
  return ans.reverse().join("")
}
module.exports = add;