function Stack(){
  var arr = []
  var i = 0
  this.push = function(num){
    arr[i] = num
    return i++
  }
  this.pop = function(){
    i--
    var lastnum = arr[i]
    return lastnum
  }
}
var stack = new Stack()
stack.push("C")
stack.push(15)
stack.push(10)
stack.push(5)
console.log(stack.pop()) 
console.log(stack.pop()) 
console.log(stack.pop())
console.log(stack.pop())



function Queue(){
  var arr = []
  var i = 0
  this.push = function(num){
    arr[i] = num
    i++
  }
  this.pop = function(){
    if(arr.length !== 0){
      var ans = arr[0]
      arr.splice(0,1)
      return ans
    }
  }
}

var queue = new Queue()
queue.push(1)
queue.push(2)
queue.push(3)
queue.push(4)

console.log(queue.pop()) // 1
console.log(queue.pop()) // 2
console.log(queue.pop())
console.log(queue.pop())